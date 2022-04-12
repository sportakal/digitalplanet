# Digitalplanet E-Fatura PHP SDK

Digitalplanet E-Fatura/E-Arşiv Fatura webservis PHP entegrasyonu için hazırlanmıştır.

Digitalplanet altyapısı ile hizmet
veren, [Trendyolefaturam](https://portal.trendyolefaturam.com/TRY/Login/index.html?returnUrl=/)
, [N11faturam](https://www.n11faturam.com/N11/index.html?returnUrl=/DefaultPage.aspx) gibi servislerin kullanımı için de
uygundur.

Webservis erişim bilgileri için hizmet sağlayıcınız ile erişime geçmelisiniz.

# Installation

### Composer

Bağımlılıkları [Composer](http://getcomposer.org/) ile yükleyebilirsiniz.

```bash
$ composer require sportakal/digitalplanet
```

Bağımlılıkları kullanmak için Composer'ın [autoload](https://getcomposer.org/doc/00-intro.md#autoloading) özelliğini
kullanın.

```php
require_once('vendor/autoload.php');
```

# Usage

### Authentication

Webservis erişim bilgilerinizi **Options** nesnesine atayın.

```php
use Sportakal\Digitalplanet\Options;

$options = new Options(
    'CORPORATECODE',
    'wsuser',
    'password',
    'https://partnerintegrationservicewithoutmtom.digitalplanet.com.tr/PartnerIntegrationService.asmx');
```

### CheckCustomerTaxId

TCKN veya VKN'nin geçerli bir e-fatura kullanıcısı olup olmadığını sorgulayın.

```php
use Sportakal\Digitalplanet\Requests\CheckCustomerTaxIdRequest;
use Sportakal\Digitalplanet\Make;

$CheckCustomerTaxIdRequest = new CheckCustomerTaxIdRequest(123445678901);

$response = Make::exec($CheckCustomerTaxIdRequest, $options);

echo $response->getStatusDesc();
```

### GetNewInvoiceId

Belge numarasının digitalplanet tarafından otomatik olarak oluşturulmasını sağlayın.

```php
use Sportakal\Digitalplanet\Requests\GetNewInvoiceIdRequest;
use Sportakal\Digitalplanet\Make;

$GetNewInvoiceIdRequest = new GetNewInvoiceIdRequest('2022', '12345', '0', 'MANUAL');
$response = Make::exec($GetNewInvoiceIdRequest, $options);

echo $response->getStatusDesc();
```

### GetInvoicePDF

UUID ile E-Fatura'nın bilgilerini ve E-Faturayı PDF olarak görüntüleyin.

```php
use Sportakal\Digitalplanet\Requests\GetInvoicePDFRequest;
use Sportakal\Digitalplanet\Make;

$GetInvoicePDFRequest = new GetInvoicePDFRequest('4292B20F-7C06-F871-974E-8000E77AD64F');

$response = Make::exec($GetInvoicePDFRequest, $options);

header('Content-Type: application/pdf');
echo base64_decode($response->getValue('ReturnValue'));
```

### GetEArchiveInvoice

E-Arşiv faturanın bilgilerini ve faturayı PDF olarak görüntüleyin.

```php
use Sportakal\Digitalplanet\Requests\GetEArchiveInvoiceRequest;
use Sportakal\Digitalplanet\Make;

$GetEArchiveInvoiceRequest = new GetEArchiveInvoiceRequest('TRL2022000000001', 'INVOICEID', 'PDF');

$response = Make::exec($GetEArchiveInvoiceRequest, $options);

header('Content-Type: application/pdf');
echo base64_decode($response->getValue('ReturnValue'));
```

### SendInvoiceData

E-Fatura Düzenleyin ve gönderin.

```php
use Sportakal\Digitalplanet\Requests\SendInvoiceData;
use Sportakal\Digitalplanet\Make;
use Sportakal\Digitalplanet\Models\*;

////////////////////// RECIPIENT INFO ////////////////////////////
$recipientAddress = new Address();
$recipientAddress->setCountry('Türkiye');
$recipientAddress->setCityName('Denizli');
$recipientAddress->setCitySubdivisionName('Merkezefendi');

$recipientInfo = new RecipientInfo();
$recipientInfo->setIdentification(new Identification('VKN', 2222222222));
$recipientInfo->setPartyName('SC B&B Collection SRL');
$recipientInfo->setPartyTaxScheme('Pamukkale V.D.');
$recipientInfo->setAddress($recipientAddress);
////////////////////// RECIPIENT INFO ////////////////////////////

////////////////////// SENDER INFO ////////////////////////////
$senderAddress = new Address();
$senderAddress->setCountry('Türkiye');
$senderAddress->setCityName('Denizli');
$senderAddress->setCitySubdivisionName('Pamukkale');

$senderInfo = new SenderInfo();
$senderInfo->setIdentification(new Identification('VKN', '9876543210'));
$senderInfo->setPartyName('PE PORTAKAL ENERJİ BİLİŞİM LİMİTED ŞİRKETİ');
$senderInfo->setPartyTaxScheme('Pamukkale Vergi Dairesi');
$senderInfo->setWebUrl('www.efatura.gov.tr');
$senderInfo->setAddress($senderAddress);
////////////////////// SENDER INFO ////////////////////////////

////////////////////// INVOICE LINES ////////////////////////////
$taxCategory = new TaxCategory();
$taxCategory->setTaxExemptionReason('');
$taxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

$taxSubTotals = new TaxSubTotals();
$taxSubTotals->setTaxableAmount(new Price(Currencies::TRY, 16.865));
$taxSubTotals->setTaxAmount(new Price(Currencies::TRY, 3.035));
$taxSubTotals->setCalculationSequenceNumeric(1);
$taxSubTotals->setTransactionCurrencyTaxAmount(new Price(Currencies::TRY, 5.88));
$taxSubTotals->setPercent(18);
$taxSubTotals->setBaseUnitMeasure(new BaseUnitMeasure('C53', 0.0));
$taxSubTotals->setPerUnitAmount(new Price(Currencies::TRY, 5.88));
$taxSubTotals->setTaxCategory($taxCategory);

$taxTotal = new TaxTotal();
$taxTotal->setTaxAmount(new Price(Currencies::TRY, 3.035));
$taxTotal->setTaxSubtotal($taxSubTotals);

$item = new Item();
$item->setName('parfüm');

$line = new Line();
$line->setId('1');
$line->setItem($item);
$line->setInvoicedQuantity(new InvoicedQuantity('C62', 1));
$line->setLineExtensionAmount(new Price(Currencies::TRY, 19.9));
$line->setTaxTotal($taxTotal);
$line->setPrice(new Price(Currencies::TRY, 16.865));

$invoiceLines = new InvoiceLines();
$invoiceLines->setLine($line);
////////////////////// INVOICE LINES ////////////////////////////

////////////////////// INVOICE INFO ////////////////////////////
$invoiceInfo = new InvoiceInfo();
$invoiceInfo->setInvoiceId(time());
$invoiceInfo->setLineCount(1);
$invoiceInfo->setScenario('TEMELFATURA');
$invoiceInfo->setIssueDate(date('Y-m-d'));
$invoiceInfo->setIssueTime(date('H:i:s'));
$invoiceInfo->setInvoiceTypeCode('SATIS');
$invoiceInfo->setCopyIndicator('false');
$invoiceInfo->setUuid(GuidCreator::get());
$invoiceInfo->setCurrency(new Currency('DocumentCurrencyCode', Currencies::TRY));
$invoiceInfo->setAlias('urn:mail:defaultpk@sinanporta.com');
$invoiceInfo->setSendingType('KAGIT');
////////////////////// INVOICE INFO ////////////////////////////

////////////////////// TAXES ////////////////////////////
$taxesTaxCategory = new TaxCategory();
$taxesTaxCategory->setTaxExemptionReason('');
$taxesTaxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

$taxesTaxSubTotals = new TaxSubTotals();
$taxesTaxSubTotals->setTaxableAmount(new Price(Currencies::TRY, 16.865));
$taxesTaxSubTotals->setTaxAmount(new Price(Currencies::TRY, 3.055));
$taxesTaxSubTotals->setCalculationSequenceNumeric(1);
$taxesTaxSubTotals->setTransactionCurrencyTaxAmount(new Price(Currencies::TRY, 5.88));
$taxesTaxSubTotals->setPercent(18);
$taxesTaxSubTotals->setBaseUnitMeasure(new BaseUnitMeasure('C53', 0.0));
$taxesTaxSubTotals->setPerUnitAmount(new Price(Currencies::TRY, 5.88));
$taxesTaxSubTotals->setTaxCategory($taxesTaxCategory);

$taxes = new Taxes();
$taxes->setWithholding(false);
$taxes->setTaxAmount(new Price('TRY', 3.055));
$taxes->setTaxSubTotals($taxesTaxSubTotals);
////////////////////// TAXES ////////////////////////////

////////////////////// INVOICE TOTALS ////////////////////////////
$invoiceTotals = new InvoiceTotals();
$invoiceTotals->setLineExtensionAmount(new Price(Currencies::TRY, 16.865));
$invoiceTotals->setTaxExclusiveAmount(new Price(Currencies::TRY, 16.865));
$invoiceTotals->setTaxInclusiveAmount(new Price(Currencies::TRY, 16.865 + 3.0355));
$invoiceTotals->setAllowanceTotalAmount(new Price(Currencies::TRY, 5.88));
$invoiceTotals->setChargeTotalAmount(new Price(Currencies::TRY, 0));
$invoiceTotals->setPayableRoundingAmount(new Price(Currencies::TRY, 0));
$invoiceTotals->setPayableAmount(new Price(Currencies::TRY, 19.9));
////////////////////// INVOICE TOTALS ////////////////////////////

////////////////////// NOTES ////////////////////////////
$notes = new Notes('Test Notes');
$notes->addNote('Test Notes 2');
////////////////////// NOTES ////////////////////////////

$invoice = new Invoice();
$invoice->setRecipientInfo($recipientInfo);
$invoice->setSenderInfo($senderInfo);
$invoice->setInvoiceInfo($invoiceInfo);
$invoice->setInvoiceLines($invoiceLines);
$invoice->setTaxes($taxes);
$invoice->setInvoiceTotals($invoiceTotals);
$invoice->setNotes($notes);

$invoices = new Invoices($invoice);
$SendInvoiceData = new SendInvoiceData($options->getCorporateCode(), $invoices, '', '');

$response = Make::exec($SendInvoiceData, $options);

echo $response->getStatusDesc();
```

***/samples*** klasöründe daha fazla örnek bulabilirsiniz.

## Development

Bağımlılıkları yükleyin:

``` bash
composer install
```

