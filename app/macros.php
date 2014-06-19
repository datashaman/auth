<?php

Response::macro(
    'paginator', function ($defn, $statusCode=200) {
        $name = head(array_keys($defn));
        $paginator = $defn[$name];
        $pagination = $paginator->toArray();
        $data = array_pull($pagination, 'data');
        $resource =  [ $name => $data, 'meta' => [ 'pagination' => $pagination ]];
        return Response::success($resource, $statusCode);
    }
);

Response::macro(
    'success', function ($resource, $statusCode=200) {
        $payload = [ 'status' => 'success', 'data' => $resource ];
        return Response::json($payload, $statusCode);
    }
);

Response::macro(
    'fail', function ($reason, $statusCode=400) {
        $payload = [ 'status' => 'fail', 'data' => $reason ];
        return Response::json($payload, $statusCode);
    }
);

Response::macro(
    'error', function ($message, $exception, $statusCode=500) {
        $payload = [
            'status' => 'error',
            'message' => $message,
            'data' => [
                'exception' => [
                    'class' => get_class($exception),
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTrace(),
                ],
            ],
        ];
        return Response::json($payload, $statusCode);
    }
);
