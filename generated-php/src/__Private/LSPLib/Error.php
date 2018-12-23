<?php
namespace Facebook\HHAST\__Private\LSPLib;

use Facebook\HHAST\__Private\LSP as LSP;
final class Error extends SuccessOrError
{
    /**
     * @var TErrorCode
     */
    private $code;
    /**
     * @var string
     */
    private $message;
    /**
     * @var TErrorData
     */
    private $data;
    /**
     * @var TErrorData
     */
    public function __construct(TErrorCode $code, string $message, TErrorData $data);
    /**
     * @return bool
     */
    public function isSuccess()
    {
        return false;
    }
    /**
     * @return TResult
     */
    public function getResult()
    {
        invariant_violation('%s should not be called on %s', __METHOD__, __CLASS__);
    }
    /**
     * @return static
     */
    public function getError()
    {
        return $this;
    }
    /**
     * @return LSP\ResponseError
     */
    public function asResponseError()
    {
        $s = array('code' => $this->code, 'message' => $this->message);
        if ($this->data !== null) {
            $s['data'] = $this->data;
        }
        return $s;
    }
}

