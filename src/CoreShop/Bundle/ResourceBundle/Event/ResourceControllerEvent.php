<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
*/

namespace CoreShop\Bundle\ResourceBundle\Event;

use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Response;

class ResourceControllerEvent extends GenericEvent
{
    const TYPE_ERROR = 'error';
    const TYPE_WARNING = 'warning';
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';

    /**
     * @var string
     */
    private $messageType = '';

    /**
     * @var string
     */
    private $message = '';

    /**
     * @var array
     */
    private $messageParameters = [];

    /**
     * @var int
     */
    private $errorCode = 500;

    /**
     * @var Response
     */
    private $response;

    /**
     * @param string $message
     * @param string $type
     * @param array  $parameters
     * @param int    $errorCode
     */
    public function stop($message, $type = self::TYPE_ERROR, $parameters = [], $errorCode = 500)
    {
        $this->messageType = $type;
        $this->message = $message;
        $this->messageParameters = $parameters;
        $this->errorCode = $errorCode;

        $this->stopPropagation();
    }

    /**
     * @return bool
     */
    public function isStopped(): bool
    {
        return $this->isPropagationStopped();
    }

    /**
     * @return string
     */
    public function getMessageType(): string
    {
        return $this->messageType;
    }

    /**
     * @param string $messageType Should be one of ResourceEvent's TYPE constants
     * @return static
     */
    public function setMessageType(string $messageType): ResourceControllerEvent
    {
        $this->messageType = $messageType;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return static
     */
    public function setMessage($message): ResourceControllerEvent
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return array
     */
    public function getMessageParameters(): array
    {
        return $this->messageParameters;
    }

    /**
     * @param array $messageParameters
     *
     * @return static
     */
    public function setMessageParameters(array $messageParameters): ResourceControllerEvent
    {
        $this->messageParameters = $messageParameters;

        return $this;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     *
     * @return static
     */
    public function setErrorCode($errorCode): ResourceControllerEvent
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @param Response $response
     *
     * @return static
     */
    public function setResponse(Response $response): ResourceControllerEvent
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasResponse(): bool
    {
        return null !== $this->response;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
