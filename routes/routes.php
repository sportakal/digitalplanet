<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Sportakal\Digitalplanet\Helpers\CreateGuid;
use Sportakal\Digitalplanet\Models\Documents\Currencies;
use Sportakal\Digitalplanet\Models\Documents\Invoices;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Address;
use Sportakal\Digitalplanet\Models\Documents\Nodes\AgentParty;
use Sportakal\Digitalplanet\Models\Documents\Nodes\AllowanceCharge;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Attachment;
use Sportakal\Digitalplanet\Models\Documents\Nodes\BaseUnitMeasure;
use Sportakal\Digitalplanet\Models\Documents\Nodes\CashRegisterInfo;
use Sportakal\Digitalplanet\Models\Documents\Nodes\CommunicationChannels;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Currency;
use Sportakal\Digitalplanet\Models\Documents\Nodes\DocumentReference;
use Sportakal\Digitalplanet\Models\Documents\Nodes\DurationMeasure;
use Sportakal\Digitalplanet\Models\Documents\Nodes\ECommerceInfo;
use Sportakal\Digitalplanet\Models\Documents\Nodes\ExchangeRate;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Identification;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Invoice;
use Sportakal\Digitalplanet\Models\Documents\Nodes\InvoicedQuantity;
use Sportakal\Digitalplanet\Models\Documents\Nodes\InvoiceInfo;
use Sportakal\Digitalplanet\Models\Documents\Nodes\InvoiceLines;
use Sportakal\Digitalplanet\Models\Documents\Nodes\InvoicePeriod;
use Sportakal\Digitalplanet\Models\Documents\Nodes\InvoiceTotals;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Item;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Line;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Notes;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Options;
use Sportakal\Digitalplanet\Models\Documents\Nodes\OrderReference;
use Sportakal\Digitalplanet\Models\Documents\Nodes\PayeeFinancialAccount;
use Sportakal\Digitalplanet\Models\Documents\Nodes\PaymentMeans;
use Sportakal\Digitalplanet\Models\Documents\Nodes\PaymentTerms;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Person;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Price;
use Sportakal\Digitalplanet\Models\Documents\Nodes\RecipientInfo;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Reference;
use Sportakal\Digitalplanet\Models\Documents\Nodes\SenderInfo;
use Sportakal\Digitalplanet\Models\Documents\Nodes\ShipperInfo;
use Sportakal\Digitalplanet\Models\Documents\Nodes\TaxCategory;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Taxes;
use Sportakal\Digitalplanet\Models\Documents\Nodes\TaxScheme;
use Sportakal\Digitalplanet\Models\Documents\Nodes\TaxSubTotals;
use Sportakal\Digitalplanet\Models\Documents\Nodes\TaxTotal;
use Sportakal\Digitalplanet\Requests\CheckCustomerTaxId;
use Sportakal\Digitalplanet\Requests\GetEArchiveInvoice;
use Sportakal\Digitalplanet\Requests\GetFormsAuthenticationTicket;
use Sportakal\Digitalplanet\Requests\GetInvoiceByInvoiceID;
use Sportakal\Digitalplanet\Requests\GetInvoicePDF;
use Sportakal\Digitalplanet\Requests\GetInvoicePDFByInvoiceIdWithoutDirection;
use Sportakal\Digitalplanet\Requests\GetNewInvoiceId;
use Sportakal\Digitalplanet\Requests\SendEArchiveData;
use Sportakal\Digitalplanet\Requests\SendEArchiveDataWithTemplateCode;
use Sportakal\Digitalplanet\Requests\SendInvoiceDataWithTemplateCode;
use Sportakal\Digitalplanet\Requests\SendXmlInvoice;
use Sportakal\Digitalplanet\Digitalplanet;

Route::group(['prefix' => 'digitalplanet'], function () {
    Route::get('ticket', function () {
        return (new Digitalplanet())->getTicket();
    });

    Route::get('check-tax', function () {
        $CheckCustomerTaxId = new CheckCustomerTaxId('13546972816');
        $response = $CheckCustomerTaxId->send();

        return response($response->getSoapResult(), 200, ['Content-Type' => 'text/xml']);
    });

    Route::get('get-new-invoice-id', function () {
        $GetNewInvoiceId = new GetNewInvoiceId(
            '2022',
            time(),
            '1',
            'MANUAL');
        $response = $GetNewInvoiceId->send();
        $response->getBody();

        return response($response->getSoapResult(), 200, ['Content-Type' => 'text/xml']);
    });


    Route::get('send-invoice', function () {
        ////////////////////// RECIPIENT INFO ////////////////////////////
//        $person = new Person();
//        $person->setTitle('Uzman');
//        $person->setFirstName('Sinan');
//        $person->setFamilyName('Portakal');
//        $person->setMiddleName('Mehmet');
//        $person->setNameSuffix('Doçent');

        $address = new Address();
        $address->setCountry('Türkiye');
        $address->setCityName('Denizli');
        $address->setCitySubdivisionName('Merkezefendi');
        $address->setRoom('106');
        $address->setStreetName('');
        $address->setBuildingName('');
        $address->setBuildingNumber('');
        $address->setPostalZone('20100');
        $address->setRegion('');
        $address->setId('');

        $communicationChannels = new CommunicationChannels();
        $communicationChannels->setTelephone('');
        $communicationChannels->setTelefax('');
        $communicationChannels->setElectronicalMail('');

//        $agentParty = new AgentParty();
//        $agentParty->setPerson($person);
//        $agentParty->setIdentification(new Identification('VKN', '2650167841'));
//        $agentParty->setPartyName('Ankara Bayi');
//        $agentParty->setWebUrl('www.digitalplanet.com');
//        $agentParty->setAddress($address);
//        $agentParty->setCommunicationChannels($communicationChannels);
//        $agentParty->setPartyTaxScheme('Çankaya Vergi Dairesi');

        $recipientInfo = new RecipientInfo();
        $recipientInfo->setIdentification(new Identification('VKN', 2222222222));
        $recipientInfo->setPartyName('SC B&B Collection SRL');
//        $recipientInfo->setPerson($person);
        $recipientInfo->setWebUrl('');
        $recipientInfo->setAddress($address);
        $recipientInfo->setCommunicationChannels($communicationChannels);
        $recipientInfo->setPartyTaxScheme('');
//        $recipientInfo->setAgentParty($agentParty);
        ////////////////////// RECIPIENT INFO ////////////////////////////


        ////////////////////// SENDER INFO ////////////////////////////
//        $senderPerson = new Person();
//        $senderPerson->setTitle('Uzm. Yardımcısı');
//        $senderPerson->setFirstName('Hasan');
//        $senderPerson->setFamilyName('Doğan');
//        $senderPerson->setMiddleName('Kaan');
//        $senderPerson->setNameSuffix('Dr.');

        $senderAddress = new Address();
        $senderAddress->setCountry('Türkiye');
        $senderAddress->setCityName('Denizli');
        $senderAddress->setCitySubdivisionName('Pamukkale');
        $senderAddress->setRoom('');
        $senderAddress->setStreetName('Kınıklı Mah. Çamlık Bulv.');
        $senderAddress->setBuildingName('Bingül Hanım İş Merkezi');
        $senderAddress->setBuildingNumber('76');
        $senderAddress->setPostalZone('20100');
        $senderAddress->setRegion('Pamukkale');
        $senderAddress->setId('34191356');

        $senderCommunicationChannels = new CommunicationChannels();
        $senderCommunicationChannels->setTelephone('+90 (555) 470 50 20');
        $senderCommunicationChannels->setTelefax('');
        $senderCommunicationChannels->setElectronicalMail('hello@simpliers.com');

//        $senderAgentParty = new AgentParty();
//        $senderAgentParty->setPerson($senderPerson);
//        $senderAgentParty->setIdentification(new Identification('VKN', '7230826945'));
//        $senderAgentParty->setPartyName('Ana Bayii');
//        $senderAgentParty->setWebUrl('www.efatura.gov.tr');
//        $senderAgentParty->setAddress($senderAddress);
//        $senderAgentParty->setCommunicationChannels($senderCommunicationChannels);
//        $senderAgentParty->setPartyTaxScheme('Pamukkale Vergi Dairesi');

        $senderInfo = new SenderInfo();
        $senderInfo->setIdentification(new Identification('VKN', '7230826945'));
        $senderInfo->setPartyName('PE PORTAKAL ENERJİ BİLİŞİM LİMİTED ŞİRKETİ');
//        $senderInfo->setPerson($senderPerson);
        $senderInfo->setWebUrl('www.efatura.gov.tr');
        $senderInfo->setAddress($senderAddress);
        $senderInfo->setCommunicationChannels($senderCommunicationChannels);
        $senderInfo->setPartyTaxScheme('Pamukkale Vergi Dairesi');
//        $senderInfo->setAgentParty($senderAgentParty);
        ////////////////////// SENDER INFO ////////////////////////////

        ////////////////////// INVOICE INFO ////////////////////////////
//        $invoicePeriod = new InvoicePeriod();
//        $invoicePeriod->setStartDate(Carbon::now()->format('Y-m-d'));
//        $invoicePeriod->setEndDate(Carbon::now()->addWeek()->format('Y-m-d'));
//        $invoicePeriod->setDurationMeasure(new DurationMeasure('HUR', '1'));
//        $invoicePeriod->setDescription('Saat');

//        $paymentMeans = new PaymentMeans();
//        $paymentMeans->setPaymentMeansCode('4');
//        $paymentMeans->setPaymentDueDate(Carbon::now()->format('Y-m-d'));
//        $paymentMeans->setPaymentChannelCode(6);
//        $paymentMeans->setInstructionNote('Ödemeler peşin olacaktır.');
//        $paymentMeans->setPayeeFinancialAccount(new PayeeFinancialAccount('TR12345678901234567890', 'TRY', 'IBAN NO'));

//        $paymentTerms = new PaymentTerms();
//        $paymentTerms->setNote('Ödemeler peşin olacaktır.');
//        $paymentTerms->setPenaltySurchargePercent(8);
//        $paymentTerms->setPaymentTermsAmount(new Price('TRY', 100));

        $invoiceInfo = new InvoiceInfo();
        $invoiceInfo->setInvoiceId(time());
        $invoiceInfo->setLineCount(1);
        $invoiceInfo->setScenario('TEMELFATURA');
        $invoiceInfo->setIssueDate(Carbon::now()->format('Y-m-d'));
        $invoiceInfo->setIssueTime(Carbon::now()->format('H:i:s'));
        $invoiceInfo->setInvoiceTypeCode('SATIS');
        $invoiceInfo->setCopyIndicator('false');
        $invoiceInfo->setUuid(CreateGuid::guid());
        $invoiceInfo->setCurrency(new Currency('DocumentCurrencyCode', 'USD'));
//        $invoiceInfo->setInvoicePeriod($invoicePeriod);
//        $invoiceInfo->setPaymentMeans($paymentMeans);
//        $invoiceInfo->setPaymentTerms($paymentTerms);
        $invoiceInfo->setAlias('urn:mail:defaultpk@sinanporta.com');
        $invoiceInfo->setSendingType('KAGIT');
        ////////////////////// INVOICE INFO ////////////////////////////

        ////////////////////// INVOICE LINES ////////////////////////////
//        $allowanceCharge = new AllowanceCharge();
//        $allowanceCharge->setChargeIndicator(false);
//        $allowanceCharge->setAllowanceChargeReason('ön ödeme');
//        $allowanceCharge->setMultiplierFactorNumeric(0.02);
//        $allowanceCharge->setChargeAmount(new Price('TRY', 2));
//        $allowanceCharge->setBaseAmount(new Price('TRY', 100));

        $taxCategory = new TaxCategory();
        $taxCategory->setTaxExemptionReason('');
        $taxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

        $taxSubTotals = new TaxSubTotals();
        $taxSubTotals->setTaxableAmount(new Price(Currencies::USD, 16.865));
        $taxSubTotals->setTaxAmount(new Price('USD', 3.035));
//        $taxSubTotals->setCalculationSequenceNumeric(1);
//        $taxSubTotals->setTransactionCurrencyTaxAmount(new Price('TRY', 5.88));
        $taxSubTotals->setPercent(18);
//        $taxSubTotals->setBaseUnitMeasure(new BaseUnitMeasure('C53', 0.0));
//        $taxSubTotals->setPerUnitAmount(new Price('TRY', 5.88));
        $taxSubTotals->setTaxCategory($taxCategory);

        $taxTotal = new TaxTotal();
        $taxTotal->setTaxAmount(new Price('USD', 3.035));
        $taxTotal->setTaxSubtotal($taxSubTotals);

        $item = new Item();
//        $item->setDescription('Erkek');
        $item->setName('parfüm');
//        $item->setBrandName('CK');
//        $item->setModelName('1052');
//        $item->setBuyersItemIdentification('Az1234');
//        $item->setSellersItemIdentification('Bc4321');
//        $item->setManufacturersItemIdentification('Dc4567');
//        $item->setComodityClassification('302');

        $line = new Line();
        $line->setId('1');
        $line->setNote('Ürün A');
        $line->setInvoicedQuantity(new InvoicedQuantity('C62', 1));
        $line->setLineExtensionAmount(new Price('USD', 19.9));
//        $line->setAllowanceCharge($allowanceCharge);
        $line->setTaxTotal($taxTotal);
        $line->setItem($item);
        $line->setPrice(new Price('USD', 16.865));

        $invoiceLines = new InvoiceLines();
        $invoiceLines->setLine($line);
        ////////////////////// INVOICE LINES ////////////////////////////


        ////////////////////// TAXES ////////////////////////////
        $taxesTaxCategory = new TaxCategory();
        $taxesTaxCategory->setTaxExemptionReason('');
        $taxesTaxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

        $taxesTaxSubTotals = new TaxSubTotals();
        $taxesTaxSubTotals->setTaxableAmount(new Price('USD', 16.865));
        $taxesTaxSubTotals->setTaxAmount(new Price('USD', 3.055));
//        $taxesTaxSubTotals->setCalculationSequenceNumeric(1);
//        $taxesTaxSubTotals->setTransactionCurrencyTaxAmount(new Price('TRY', 5.88));
        $taxesTaxSubTotals->setPercent(18);
//        $taxesTaxSubTotals->setBaseUnitMeasure(new BaseUnitMeasure('C53', 0.0));
//        $taxesTaxSubTotals->setPerUnitAmount(new Price('TRY', 5.88));
        $taxesTaxSubTotals->setTaxCategory($taxesTaxCategory);

        $taxes = new Taxes();
        $taxes->setWithholding(false);
        $taxes->setTaxAmount(new Price('USD', 3.055));
        $taxes->setTaxSubTotals($taxesTaxSubTotals);
        ////////////////////// TAXES ////////////////////////////

        ////////////////////// INVOICE TOTALS ////////////////////////////
        $invoiceTotals = new InvoiceTotals();
        $invoiceTotals->setLineExtensionAmount(new Price('USD', 16.865));
        $invoiceTotals->setTaxExclusiveAmount(new Price('USD', 16.865));
        $invoiceTotals->setTaxInclusiveAmount(new Price('USD', 16.865 + 3.0355));
//        $invoiceTotals->setAllowanceTotalAmount(new Price('TRY', 5.88));
//        $invoiceTotals->setChargeTotalAmount(new Price('TRY', 0));
//        $invoiceTotals->setPayableRoundingAmount(new Price('TRY', 0));
        $invoiceTotals->setPayableAmount(new Price('USD', 19.9));
        ////////////////////// INVOICE TOTALS ////////////////////////////

        ////////////////////// ORDER REFERENCE ////////////////////////////
//        $attachment = new Attachment();
//        $attachment->setMimeCode('textxml');
//        $attachment->setEncodingCode('Base64');
//        $attachment->setCharacterSetCode('UTF-8');
//        $attachment->setFileName('testdata.txt');
//        $attachment->setEmbeddedDocumentBinaryObject('Base64BinaryData');
//
//        $reference = new Reference();
//        $reference->setId('76efe99a-e983-41ee-a6d9-7a628b0a7d5e');
//        $reference->setIssueDate(Carbon::now()->format('Y-m-d'));
//        $reference->setDocumentType('Veri');
//        $reference->setAttachment($attachment);
//
        $orderReference = new OrderReference();
        $orderReference->setId('Odeme ID');
        $orderReference->setIssueDate(Carbon::now()->format('Y-m-d'));
//        $orderReference->setReference($reference);
        ////////////////////// ORDER REFERENCE ////////////////////////////

        ////////////////////// DOCUMENT REFERENCE ////////////////////////////
//        $documentAttachment = new Attachment();
//        $documentAttachment->setMimeCode('applicationmsword');
//        $documentAttachment->setEncodingCode('Base64');
//        $documentAttachment->setCharacterSetCode('UTF-8');
//        $documentAttachment->setFileName('SiparisDoc.doc');
//        $documentAttachment->setEmbeddedDocumentBinaryObject('Base64BinaryData');
//
//        $documentReference = new DocumentReference();
//        $documentReference->setType('DespatchDocumentReference');
//        $documentReference->setId('c726dfc9');
//        $documentReference->setIssueDate(Carbon::now()->format('Y-m-d'));
//        $documentReference->setDocumentType('Veri');
//        $documentReference->setAttachment($documentAttachment);
        ////////////////////// DOCUMENT REFERENCE ////////////////////////////

        ////////////////////// EXCHANGE RATE ////////////////////////////
        $exchangeRate = new ExchangeRate();
        $exchangeRate->setType('PricingExchangeRate');
        $exchangeRate->setSourceCurrencyCode('USD');
        $exchangeRate->setTargetCurrencyCode('TRY');
        $exchangeRate->setCalculationRate(1.92);
        $exchangeRate->setDate(Carbon::now()->format('Y-m-d'));
        ////////////////////// EXCHANGE RATE ////////////////////////////

        ////////////////////// ALLOWANCE CHARGE ////////////////////////////
//        $allowanceCharge = new AllowanceCharge();
//        $allowanceCharge->setChargeIndicator(false);
//        $allowanceCharge->setAllowanceChargeReason('peşin ödeme');
//        $allowanceCharge->setMultiplierFactorNumeric(0.02);
//        $allowanceCharge->setChargeAmount(new Price('TRY', 2));
//        $allowanceCharge->setBaseAmount(new Price('TRY', 100));
        ////////////////////// ALLOWANCE CHARGE ////////////////////////////

        ////////////////////// NOTES ////////////////////////////
        $notes = new Notes('Test Notes');
        $notes->addNote('Test Notes 2');
        ////////////////////// NOTES ////////////////////////////

        ////////////////////// OPTIONS ////////////////////////////
        $invoiceOptions = new Options('Iskonto', '2');
        ////////////////////// OPTIONS ////////////////////////////

        ////////////////////// ECOMMERCE INFO ////////////////////////////
//        $shipperInfo = new ShipperInfo();
//        $shipperInfo->setPartyName('Yurtiçi Kargo');
//        $shipperInfo->setSendingDate(Carbon::now()->format('Y-m-d'));
//        $shipperInfo->setIdentification(new Identification('VKN', '1461611967'));
//
//        $eCommerceInfo = new ECommerceInfo();
//        $eCommerceInfo->setWebUrl('http://www.example.com');
//        $eCommerceInfo->setPaymentAgentName('PayU');
//        $eCommerceInfo->setShipperInfo($shipperInfo);
        ////////////////////// ECOMMERCE INFO ////////////////////////////

        ////////////////////// CASH REGISTER INFO ////////////////////////////
//        $cashRegisterInfo = new CashRegisterInfo();
//        $cashRegisterInfo->setId('KN1234567890');
//        $cashRegisterInfo->setZId('1967');
//        $cashRegisterInfo->setSlipId('1923');
//        $cashRegisterInfo->setSlipDate(Carbon::now()->format('Y-m-d'));
        ////////////////////// CASH REGISTER INFO ////////////////////////////

        $invoice = new Invoice();
        $invoice->setRecipientInfo($recipientInfo);
        $invoice->setSenderInfo($senderInfo);
        $invoice->setInvoiceInfo($invoiceInfo);
        $invoice->setInvoiceLines($invoiceLines);
        $invoice->setTaxes($taxes);
        $invoice->setInvoiceTotals($invoiceTotals);
        $invoice->setOrderReference($orderReference);
//        $invoice->setDocumentReference($documentReference);
        $invoice->setExchangeRate($exchangeRate);
//        $invoice->setAllowanceCharge($allowanceCharge);
        $invoice->setNotes($notes);
        $invoice->setOptions($invoiceOptions);
//        $invoice->setECommerceInfo($eCommerceInfo);
//        $invoice->setCashRegisterInfo($cashRegisterInfo);

        $corporateCode = config('digitalplanet.options.corporate_code');

        $invoiceRawData = new Invoices($invoice);
        $invoiceString = $invoiceRawData->getXML();
        $invoiceRawData = base64_encode($invoiceString);
        $SendInvoiceData = new SendInvoiceDataWithTemplateCode($corporateCode, $invoiceRawData);
        $response = $SendInvoiceData->send(true);

        return response($response->getSoapResult(), 200, ['Content-Type' => 'text/xml']);
    });

    Route::get('get-invoice', function () {
        $GetInvoicePDF = new GetInvoiceByInvoiceID('TRN2022000000024');
        $response = $GetInvoicePDF->send();
        return response($response->getSoapResult(), 200, ['Content-Type' => 'text/xml']);
    });

    Route::get('get-earchive', function () {
        $GetInvoicePDF = new GetEArchiveInvoice('TRN2022000000024');
        $response = $GetInvoicePDF->send();
        return response($response->getSoapResult(), 200, ['Content-Type' => 'text/xml']);
    });

    Route::get('get-pdf-by-invoiceId', function () {
        $GetInvoicePDFByInvoiceIdWithoutDirection = new GetInvoicePDFByInvoiceIdWithoutDirection('TRN2022000000024');
        $response = $GetInvoicePDFByInvoiceIdWithoutDirection->send();
        $result = $response->getSoapResult();
        $base64Data = $result['ReturnValue'];
        $data = base64_decode($base64Data);

        return response($data, 200, ['Content-Type' => 'application/pdf']);
    });

    Route::get('get-pdf', function () {
        $GetInvoicePDF = new GetInvoicePDF('A3B02292-EDA3-98F9-500B-EC51F7DE7A09');
        $response = $GetInvoicePDF->send();

        return response($response->getSoapResult(), 200, ['Content-Type' => 'text/xml']);
    });
});
