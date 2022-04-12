<?php

namespace Sportakal\Digitalplanet\Models;

class PaymentMeans extends DigitalplanetModel
{
    protected int $PaymentMeansCode;
    /**
     *  values:
     * 48 - Credit card
     * 30 - Cash
     * 10 - Pay on delivery
     * 1 - Via provider
     * 97 - Other
     */
    protected string $PaymentDueDate;
    protected int $PaymentChannelCode;
    protected string $InstructionNote;
    protected array $PayeeFinancialAccount;

    /**
     * @param int $PaymentMeansCode
     */
    public function setPaymentMeansCode(int $PaymentMeansCode): void
    {
        $this->PaymentMeansCode = $PaymentMeansCode;
    }

    /**
     * @param string $PaymentDueDate
     */
    public function setPaymentDueDate(string $PaymentDueDate): void
    {
        $this->PaymentDueDate = $PaymentDueDate;
    }

    /**
     * @param int $PaymentChannelCode
     */
    public function setPaymentChannelCode(int $PaymentChannelCode): void
    {
        $this->PaymentChannelCode = $PaymentChannelCode;
    }

    /**
     * @param string $InstructionNote
     */
    public function setInstructionNote(string $InstructionNote): void
    {
        $this->InstructionNote = $InstructionNote;
    }

    /**
     * @param PayeeFinancialAccount $PayeeFinancialAccount
     */
    public function setPayeeFinancialAccount(PayeeFinancialAccount $PayeeFinancialAccount): void
    {
        $this->PayeeFinancialAccount = $PayeeFinancialAccount->toArray();
    }
}
