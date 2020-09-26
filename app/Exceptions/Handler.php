<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Neomerx\JsonApi\Exceptions\JsonApiException;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
      // ... other exception classes
      JsonApiException::class,
    ];

    // ...

  public function render($request, Throwable $e)
  {
    if ($this->isJsonApi($request, $e)) {
      return $this->renderJsonApi($request, $e);
    }

    // do standard exception rendering here...
  }

  protected function prepareException(Throwable $e)
  {
      if ($e instanceof JsonApiException) {
        return $this->prepareJsonApiException($e);
      }

      return parent::prepareException($e);
  }
}
