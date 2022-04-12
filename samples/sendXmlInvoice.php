<?php

use Sportakal\Digitalplanet\Constants\Currencies;
use Sportakal\Digitalplanet\Constants\PaymentMeansCodes;
use Sportakal\Digitalplanet\Models\Address;
use Sportakal\Digitalplanet\Models\AllowanceCharge;
use Sportakal\Digitalplanet\Models\BaseUnitMeasure;
use Sportakal\Digitalplanet\Models\CashRegisterInfo;
use Sportakal\Digitalplanet\Models\CommunicationChannels;
use Sportakal\Digitalplanet\Models\Currency;
use Sportakal\Digitalplanet\Models\DurationMeasure;
use Sportakal\Digitalplanet\Models\ECommerceInfo;
use Sportakal\Digitalplanet\Models\ExchangeRate;
use Sportakal\Digitalplanet\Models\Identification;
use Sportakal\Digitalplanet\Models\Invoice;
use Sportakal\Digitalplanet\Models\InvoicedQuantity;
use Sportakal\Digitalplanet\Models\InvoiceInfo;
use Sportakal\Digitalplanet\Models\InvoiceLines;
use Sportakal\Digitalplanet\Models\InvoicePeriod;
use Sportakal\Digitalplanet\Models\Invoices;
use Sportakal\Digitalplanet\Models\InvoiceTotals;
use Sportakal\Digitalplanet\Models\Item;
use Sportakal\Digitalplanet\Models\Line;
use Sportakal\Digitalplanet\Models\Notes;
use Sportakal\Digitalplanet\Models\Options;
use Sportakal\Digitalplanet\Models\OrderReference;
use Sportakal\Digitalplanet\Models\PayeeFinancialAccount;
use Sportakal\Digitalplanet\Models\PaymentMeans;
use Sportakal\Digitalplanet\Models\PaymentTerms;
use Sportakal\Digitalplanet\Models\Person;
use Sportakal\Digitalplanet\Models\Price;
use Sportakal\Digitalplanet\Models\RecipientInfo;
use Sportakal\Digitalplanet\Models\SenderInfo;
use Sportakal\Digitalplanet\Models\ShipperInfo;
use Sportakal\Digitalplanet\Models\TaxCategory;
use Sportakal\Digitalplanet\Models\Taxes;
use Sportakal\Digitalplanet\Models\TaxScheme;
use Sportakal\Digitalplanet\Models\TaxSubTotals;
use Sportakal\Digitalplanet\Models\TaxTotal;
use Sportakal\Digitalplanet\Requests\SendXmlInvoiceRequest;
use Sportakal\Digitalplanet\Utils\GuidCreator;

$options = require './options.php';


$recipientAddress = new Address();
$recipientAddress->setCountry('Türkiye');
$recipientAddress->setCityName('Denizli');
$recipientAddress->setCitySubdivisionName('Merkezefendi');
$recipientAddress->setRoom('106');
$recipientAddress->setStreetName('');
$recipientAddress->setBuildingName('');
$recipientAddress->setBuildingNumber('');
$recipientAddress->setPostalZone('20100');
$recipientAddress->setRegion('');
$recipientAddress->setId('');

$recipientCommunicationChannels = new CommunicationChannels();
$recipientCommunicationChannels->setTelephone('');
$recipientCommunicationChannels->setTelefax('');
$recipientCommunicationChannels->setElectronicalMail('');


$recipientInfo = new RecipientInfo();
/* EĞER ALICI ŞAHIS İSE BU ALAN KULLANILMALIDIR */
//$recipientInfo->setIdentification(new Identification('TCKN', 22222222222));
//$recipientPerson = new Person();
//$recipientPerson->setTitle('Uzm. Yardımcısı');
//$recipientPerson->setFirstName('Hasan');
//$recipientPerson->setFamilyName('Doğan');
//$recipientPerson->setMiddleName('Kaan');
//$recipientPerson->setNameSuffix('Dr.');
//$recipientInfo->setPerson($recipientPerson);
/* EĞER ALICI ŞAHIS İSE BU ALAN KULLANILMALIDIR */


/* EĞER ALICI ŞİRKET İSE BU ALAN KULLANILMALIDIR */
$recipientInfo->setIdentification(new Identification('VKN', 2222222222));
$recipientInfo->setPartyName('SC B&B Collection SRL');
$recipientInfo->setPartyTaxScheme('Pamukkale V.D.');
/* EĞER ALICI ŞİRKET İSE BU ALAN KULLANILMALIDIR */

/* EĞER ALICI ŞİRKETİN ALT BAYİSİ İSE BU ALAN KULLANILMALIDIR */
//        $agentParty = new AgentParty();
//        $agentParty->setPerson($person);
//        $agentParty->setIdentification(new Identification('VKN', '2650167841'));
//        $agentParty->setPartyName('Ankara Bayi');
//        $agentParty->setWebUrl('www.digitalplanet.com');
//        $agentParty->setAddress($address);
//        $agentParty->setCommunicationChannels($communicationChannels);
//        $agentParty->setPartyTaxScheme('Çankaya Vergi Dairesi');
//        $recipientInfo->setAgentParty($agentParty);
/* EĞER ALICI ŞİRKETİN ALT BAYİSİ İSE BU ALAN KULLANILMALIDIR */

$recipientInfo->setWebUrl('');
$recipientInfo->setAddress($recipientAddress);
$recipientInfo->setCommunicationChannels($recipientCommunicationChannels);
////////////////////// RECIPIENT INFO ////////////////////////////


////////////////////// SENDER INFO ////////////////////////////


$senderAddress = new Address();
$senderAddress->setCountry('Türkiye');
$senderAddress->setCityName('Denizli');
$senderAddress->setCitySubdivisionName('Pamukkale');
$senderAddress->setRoom('');
$senderAddress->setStreetName('');
$senderAddress->setBuildingName('');
$senderAddress->setBuildingNumber('');
$senderAddress->setPostalZone('20100');
$senderAddress->setRegion('Pamukkale');
$senderAddress->setId('');

$senderCommunicationChannels = new CommunicationChannels();
$senderCommunicationChannels->setTelephone('');
$senderCommunicationChannels->setTelefax('');
$senderCommunicationChannels->setElectronicalMail('');


$senderInfo = new SenderInfo();

/* EĞER GÖNDEREN ŞAHIS İSE BU ALAN KULLANILMALIDIR */
//        $senderInfo->setIdentification(new Identification('TCKN', '22222222222'));
//        $senderPerson = new Person();
//        $senderPerson->setTitle('Uzm. Yardımcısı');
//        $senderPerson->setFirstName('Hasan');
//        $senderPerson->setFamilyName('Doğan');
//        $senderPerson->setMiddleName('Kaan');
//        $senderPerson->setNameSuffix('Dr.');
//        $senderInfo->setPerson($senderPerson);
/* EĞER GÖNDEREN ŞAHIS İSE BU ALAN KULLANILMALIDIR */

/* EĞER GÖNDEREN ŞİRKET İSE BU ALAN KULLANILMALIDIR */
$senderInfo->setIdentification(new Identification('VKN', '9876543210'));
$senderInfo->setPartyName('PE PORTAKAL ENERJİ BİLİŞİM LİMİTED ŞİRKETİ');
$senderInfo->setPartyTaxScheme('Pamukkale Vergi Dairesi');
/* EĞER GÖNDEREN ŞİRKET İSE BU ALAN KULLANILMALIDIR */

/* EĞER GÖNDEREN ŞİRKETİN ALT BAYİSİ İSE BU ALAN KULLANILMALIDIR */
//        $senderAgentParty = new AgentParty();
//        $senderAgentParty->setPerson($senderPerson);
//        $senderAgentParty->setIdentification(new Identification('VKN', '9876543210'));
//        $senderAgentParty->setPartyName('Ana Bayii');
//        $senderAgentParty->setWebUrl('www.efatura.gov.tr');
//        $senderAgentParty->setAddress($senderAddress);
//        $senderAgentParty->setCommunicationChannels($senderCommunicationChannels);
//        $senderAgentParty->setPartyTaxScheme('Pamukkale Vergi Dairesi');
//        $senderInfo->setAgentParty($senderAgentParty);
/* EĞER GÖNDEREN ŞİRKETİN ALT BAYİSİ İSE BU ALAN KULLANILMALIDIR */

$senderInfo->setWebUrl('www.efatura.gov.tr');
$senderInfo->setAddress($senderAddress);
$senderInfo->setCommunicationChannels($senderCommunicationChannels);
////////////////////// SENDER INFO ////////////////////////////

////////////////////// INVOICE INFO ////////////////////////////
$invoicePeriod = new InvoicePeriod();
$invoicePeriod->setStartDate(date('Y-m-d'));
$invoicePeriod->setEndDate(date('Y-m-d', strtotime('+1 week')));
$invoicePeriod->setDurationMeasure(new DurationMeasure('HUR', '1'));
$invoicePeriod->setDescription('Saat');

$paymentMeans = new PaymentMeans();
$paymentMeans->setPaymentMeansCode(PaymentMeansCodes::BANK_TRANSFER);
$paymentMeans->setPaymentDueDate(date('Y-m-d'));
$paymentMeans->setPaymentChannelCode(6);
$paymentMeans->setInstructionNote('Ödemeler peşin olacaktır.');
$paymentMeans->setPayeeFinancialAccount(new PayeeFinancialAccount('TR12345678901234567890', 'TRY', 'IBAN NO'));

$paymentTerms = new PaymentTerms();
$paymentTerms->setNote('Ödemeler peşin olacaktır.');
$paymentTerms->setPenaltySurchargePercent(8);
$paymentTerms->setPaymentTermsAmount(new Price('TRY', 100));

$invoiceInfo = new InvoiceInfo();
$invoiceInfo->setInvoiceId(time());
$invoiceInfo->setLineCount(1);
$invoiceInfo->setScenario('TEMELFATURA');
$invoiceInfo->setIssueDate(date('Y-m-d'));
$invoiceInfo->setIssueTime(date('H:i:s'));
$invoiceInfo->setInvoiceTypeCode('SATIS');
$invoiceInfo->setCopyIndicator('false');
$invoiceInfo->setUuid(GuidCreator::get());
$invoiceInfo->setCurrency(new Currency('DocumentCurrencyCode', 'USD'));
$invoiceInfo->setInvoicePeriod($invoicePeriod);
$invoiceInfo->setPaymentMeans($paymentMeans);
$invoiceInfo->setPaymentTerms($paymentTerms);
$invoiceInfo->setAlias('urn:mail:defaultpk@sinanporta.com');
$invoiceInfo->setSendingType('KAGIT');
////////////////////// INVOICE INFO ////////////////////////////

////////////////////// INVOICE LINES ////////////////////////////
$taxCategory = new TaxCategory();
$taxCategory->setTaxExemptionReason('');
$taxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

$taxSubTotals = new TaxSubTotals();
$taxSubTotals->setTaxableAmount(new Price(Currencies::USD, 16.865));
$taxSubTotals->setTaxAmount(new Price(Currencies::USD, 3.035));
$taxSubTotals->setCalculationSequenceNumeric(1);
$taxSubTotals->setTransactionCurrencyTaxAmount(new Price(Currencies::TRY, 5.88));
$taxSubTotals->setPercent(18);
$taxSubTotals->setBaseUnitMeasure(new BaseUnitMeasure('C53', 0.0));
$taxSubTotals->setPerUnitAmount(new Price(Currencies::TRY, 5.88));
$taxSubTotals->setTaxCategory($taxCategory);

$taxTotal = new TaxTotal();
$taxTotal->setTaxAmount(new Price(Currencies::USD, 3.035));
$taxTotal->setTaxSubtotal($taxSubTotals);

$item = new Item();
$item->setDescription('Erkek');
$item->setName('parfüm');
$item->setBrandName('CK');
$item->setModelName('1052');
$item->setBuyersItemIdentification('Az1234');
$item->setSellersItemIdentification('Bc4321');
$item->setManufacturersItemIdentification('Dc4567');
$item->setComodityClassification('302');

$line = new Line();
$line->setId('1');
$line->setNote('Ürün A');
$line->setInvoicedQuantity(new InvoicedQuantity('C62', 1));
$line->setLineExtensionAmount(new Price(Currencies::USD, 19.9));
$line->setTaxTotal($taxTotal);
$line->setItem($item);
$line->setPrice(new Price(Currencies::USD, 16.865));

$invoiceLines = new InvoiceLines();
$invoiceLines->setLine($line);
////////////////////// INVOICE LINES ////////////////////////////


////////////////////// TAXES ////////////////////////////
$taxesTaxCategory = new TaxCategory();
$taxesTaxCategory->setTaxExemptionReason('');
$taxesTaxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

$taxesTaxSubTotals = new TaxSubTotals();
$taxesTaxSubTotals->setTaxableAmount(new Price(Currencies::USD, 16.865));
$taxesTaxSubTotals->setTaxAmount(new Price(Currencies::USD, 3.055));
$taxesTaxSubTotals->setCalculationSequenceNumeric(1);
$taxesTaxSubTotals->setTransactionCurrencyTaxAmount(new Price(Currencies::TRY, 5.88));
$taxesTaxSubTotals->setPercent(18);
$taxesTaxSubTotals->setBaseUnitMeasure(new BaseUnitMeasure('C53', 0.0));
$taxesTaxSubTotals->setPerUnitAmount(new Price(Currencies::TRY, 5.88));
$taxesTaxSubTotals->setTaxCategory($taxesTaxCategory);

$taxes = new Taxes();
$taxes->setWithholding(false);
$taxes->setTaxAmount(new Price('USD', 3.055));
$taxes->setTaxSubTotals($taxesTaxSubTotals);
////////////////////// TAXES ////////////////////////////

////////////////////// INVOICE TOTALS ////////////////////////////
$invoiceTotals = new InvoiceTotals();
$invoiceTotals->setLineExtensionAmount(new Price(Currencies::USD, 16.865));
$invoiceTotals->setTaxExclusiveAmount(new Price(Currencies::USD, 16.865));
$invoiceTotals->setTaxInclusiveAmount(new Price(Currencies::USD, 16.865 + 3.0355));
$invoiceTotals->setAllowanceTotalAmount(new Price(Currencies::TRY, 5.88));
$invoiceTotals->setChargeTotalAmount(new Price(Currencies::TRY, 0));
$invoiceTotals->setPayableRoundingAmount(new Price(Currencies::TRY, 0));
$invoiceTotals->setPayableAmount(new Price(Currencies::USD, 19.9));
////////////////////// INVOICE TOTALS ////////////////////////////

////////////////////// ORDER REFERENCE ////////////////////////////
$orderReference = new OrderReference();
$orderReference->setId('Odeme ID');
$orderReference->setIssueDate(date('Y-m-d'));
////////////////////// ORDER REFERENCE ////////////////////////////

////////////////////// EXCHANGE RATE ////////////////////////////
$exchangeRate = new ExchangeRate();
$exchangeRate->setType('PricingExchangeRate');
$exchangeRate->setSourceCurrencyCode('USD');
$exchangeRate->setTargetCurrencyCode('TRY');
$exchangeRate->setCalculationRate(1.92);
$exchangeRate->setDate(date('Y-m-d'));
////////////////////// EXCHANGE RATE ////////////////////////////

////////////////////// ALLOWANCE CHARGE ////////////////////////////
$allowanceCharge = new AllowanceCharge();
$allowanceCharge->setChargeIndicator(false);
$allowanceCharge->setAllowanceChargeReason('peşin ödeme');
$allowanceCharge->setMultiplierFactorNumeric(0.02);
$allowanceCharge->setChargeAmount(new Price(Currencies::TRY, 2));
$allowanceCharge->setBaseAmount(new Price(Currencies::TRY, 100));
////////////////////// ALLOWANCE CHARGE ////////////////////////////

////////////////////// NOTES ////////////////////////////
$notes = new Notes('Test Notes');
$notes->addNote('Test Notes 2');
////////////////////// NOTES ////////////////////////////

////////////////////// OPTIONS ////////////////////////////
$invoiceOptions = new Options('Iskonto', '2');
////////////////////// OPTIONS ////////////////////////////

////////////////////// ECOMMERCE INFO ////////////////////////////
$shipperInfo = new ShipperInfo();
$shipperInfo->setPartyName('Yurtiçi Kargo');
$shipperInfo->setSendingDate(date('Y-m-d'));
$shipperInfo->setIdentification(new Identification('VKN', '1461611967'));

$eCommerceInfo = new ECommerceInfo();
$eCommerceInfo->setWebUrl('http://www.example.com');
$eCommerceInfo->setPaymentAgentName('PayU');
$eCommerceInfo->setShipperInfo($shipperInfo);
////////////////////// ECOMMERCE INFO ////////////////////////////

////////////////////// CASH REGISTER INFO ////////////////////////////
$cashRegisterInfo = new CashRegisterInfo();
$cashRegisterInfo->setId('KN1234567890');
$cashRegisterInfo->setZId('1967');
$cashRegisterInfo->setSlipId('1923');
$cashRegisterInfo->setSlipDate(date('Y-m-d'));
////////////////////// CASH REGISTER INFO ////////////////////////////

$invoice = new Invoice();
$invoice->setRecipientInfo($recipientInfo);
$invoice->setSenderInfo($senderInfo);
$invoice->setInvoiceInfo($invoiceInfo);
$invoice->setInvoiceLines($invoiceLines);
$invoice->setTaxes($taxes);
$invoice->setInvoiceTotals($invoiceTotals);
$invoice->setOrderReference($orderReference);
$invoice->setExchangeRate($exchangeRate);
$invoice->setAllowanceCharge($allowanceCharge);
$invoice->setNotes($notes);
$invoice->setOptions($invoiceOptions);
$invoice->setECommerceInfo($eCommerceInfo);
$invoice->setCashRegisterInfo($cashRegisterInfo);

$invoices = new Invoices($invoice);
$SendXmlInvoiceRequest = new SendXmlInvoiceRequest($options->getCorporateCode(), $invoices, '', '');

$response = \Sportakal\Digitalplanet\Make::exec($SendXmlInvoiceRequest, $options);

if ($response->isSuccessful()) {
    sdebug($response->getResult());
} else {
    echo $response->getStatusDesc();
}

