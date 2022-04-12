<?php

namespace Sportakal\Digitalplanet\Requests;

use Sportakal\Digitalplanet\Options;

class GetFormsAuthenticationTicketRequest extends DigitalplanetRequest
{
    protected string $CorporateCode;
    protected string $LoginName;
    protected string $Password;

    public function __construct(Options $options)
    {
        $this->CorporateCode = $options->getCorporateCode();
        $this->LoginName = $options->getLoginName();
        $this->Password = $options->getPassword();
    }

    /**
     * @return bool
     */
    public function requiresAuthentication(): bool
    {
        return false;
    }
}
