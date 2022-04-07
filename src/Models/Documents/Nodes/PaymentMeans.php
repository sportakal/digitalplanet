<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class PaymentMeans implements ElementInterface
{
    protected int $paymentMeansCode;
    protected string $paymentDueDate;
    protected int $paymentChannelCode;
    protected string $instructionNote;
    protected array $payeeFinancialAccount;

    /**
     * @param int $paymentMeansCode
     */
    public function setPaymentMeansCode(int $paymentMeansCode): void
    {
        $this->paymentMeansCode = $paymentMeansCode;
    }

    /**
     * @param string $paymentDueDate
     */
    public function setPaymentDueDate(string $paymentDueDate): void
    {
        $this->paymentDueDate = $paymentDueDate;
    }

    /**
     * @param int $paymentChannelCode
     */
    public function setPaymentChannelCode(int $paymentChannelCode): void
    {
        $this->paymentChannelCode = $paymentChannelCode;
    }

    /**
     * @param string $instructionNote
     */
    public function setInstructionNote(string $instructionNote): void
    {
        $this->instructionNote = $instructionNote;
    }

    /**
     * @param PayeeFinancialAccount $payeeFinancialAccount
     */
    public function setPayeeFinancialAccount(PayeeFinancialAccount $payeeFinancialAccount): void
    {
        $this->payeeFinancialAccount = $payeeFinancialAccount->get();
    }


    public function get(): array
    {
        return [
            'PaymentMeansCode' => $this->paymentMeansCode,
            'PaymentDueDate' => $this->paymentDueDate,
            'PaymentChannelCode' => $this->paymentChannelCode,
            'InstructionNote' => $this->instructionNote,
            'PayeeFinancialAccount' => $this->payeeFinancialAccount,
        ];
    }


}
