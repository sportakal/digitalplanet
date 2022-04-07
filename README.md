# sportakal/digitalplanet

Aşağıdaki komut ile config.php dosyasını uygulamanıza yayınlayabilirsiniz. Bu işlem, corporateCode, loginName gibi sabit
değişkenlerinizi .env'den dosyasında tutabilmenize yarar.

```shell
$ php artisan vendor:publish --provider=Sportakal\Digitalplanet\DigitalplanetServiceProvider
````

Bu işlemi yaptıktan sonra, .env dosyanızda api bilgilerinizi saklayabilirsiniz.

```dotenv
DIGITALPLANET_CORPORATE_CODE=CORPORATE_CODE
DIGITALPLANET_LOGIN_NAME=wsadmintest
DIGITALPLANET_PASSWORD=pass
DIGITALPLANET_URL=https://trendyolintegrationservicewithoutmtomtest.digitalplanet.com.tr/IntegrationService.asmx
```

Eğer, config dosyasını paylaşmayı tercih etmezseniz sabit değişkenleri methodu çağırırken de yazabilirsiniz.

```php
$options = new Digitalplanet(
    $corporateCode,
    $loginName,
    $password,
    $setUrl,
));
```

Vergi numarasının kayıtlı bir e-fatura kullanıcısı olup olmadığını kontrol etmek için,

```php
$CheckCustomerTaxId = new CheckCustomerTaxId('1234567890');
$response = $CheckCustomerTaxId->send();
return $response->getSoapResult();
```

Örnek bir fatura düzenleme işlemi;

```php
////////////////////// RECIPIENT INFO ////////////////////////////
$address = new Address();
$address->setCountry('Türkiye');
$address->setCityName('İstanbul');
$address->setCitySubdivisionName('Esenler');
$address->setRoom('106');
$address->setStreetName('YTÜ Teknopark Davutpaşa Kampüsü');
$address->setBuildingName('C Blok');
$address->setBuildingNumber('C1');
$address->setPostalZone('34500');
$address->setRegion('Davutpaşa');
$address->setId('34191356');

$communicationChannels = new CommunicationChannels();
$communicationChannels->setTelephone('+90 (212) 661 85 00');
$communicationChannels->setTelefax('+90 (212) 661 85 00');
$communicationChannels->setElectronicalMail('info@digitalplanet.com');

$recipientInfo = new RecipientInfo();
$recipientInfo->setIdentification(new Identification('VKN', '2650167841'));
$recipientInfo->setPartyName('D.T.P. Bilgi İşlem Tic. Ltd. Şti');
$recipientInfo->setWebUrl('www.digitalplanet.com.tr');
$recipientInfo->setAddress($address);
$recipientInfo->setCommunicationChannels($communicationChannels);
$recipientInfo->setPartyTaxScheme('Esenler Vergi Dairesi');
////////////////////// RECIPIENT INFO ////////////////////////////

////////////////////// SENDER INFO ////////////////////////////
$senderAddress = new Address();
$senderAddress->setCountry('Türkiye');
$senderAddress->setCityName('Istanbul');
$senderAddress->setCitySubdivisionName('Şişli');
$senderAddress->setRoom('');
$senderAddress->setStreetName('Halaskargazi Cad.');
$senderAddress->setBuildingName('Platin İş Merkezi');
$senderAddress->setBuildingNumber('76');
$senderAddress->setPostalZone('34100');
$senderAddress->setRegion('Şişli');
$senderAddress->setId('34191356');

$senderCommunicationChannels = new CommunicationChannels();
$senderCommunicationChannels->setTelephone('+90 (543) 210 12 34');
$senderCommunicationChannels->setTelefax('');
$senderCommunicationChannels->setElectronicalMail('');

$senderInfo = new SenderInfo();
$senderInfo->setIdentification(new Identification('VKN', '1234567890'));
$senderInfo->setPartyName('KENDİ UNAVNINIZ');
$senderInfo->setWebUrl('www.efatura.gov.tr');
$senderInfo->setAddress($senderAddress);
$senderInfo->setCommunicationChannels($senderCommunicationChannels);
$senderInfo->setPartyTaxScheme('KENDİ VERGİ DAİRENİZ');
////////////////////// SENDER INFO ////////////////////////////

////////////////////// INVOICE INFO ////////////////////////////
$invoiceInfo = new InvoiceInfo();
$invoiceInfo->setInvoiceId(time());
$invoiceInfo->setLineCount(1);
$invoiceInfo->setScenario('TEMELFATURA');
$invoiceInfo->setIssueDate(Carbon::now()->format('Y-m-d'));
$invoiceInfo->setIssueTime(Carbon::now()->format('H:i:s'));
$invoiceInfo->setInvoiceTypeCode('SATIS');
$invoiceInfo->setCopyIndicator('false');
$invoiceInfo->setUuid(CreateGuid::guid());
$invoiceInfo->setCurrency(new Currency('DocumentCurrencyCode', 'TRY'));
$invoiceInfo->setAlias('urn:mail:defaultpk@digitalplanet.com.tr');
$invoiceInfo->setSendingType('KAGIT');
////////////////////// INVOICE INFO ////////////////////////////

////////////////////// INVOICE LINES ////////////////////////////
$taxCategory = new TaxCategory();
$taxCategory->setTaxExemptionReason('');
$taxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

$taxSubTotals = new TaxSubTotals();
$taxSubTotals->setTaxableAmount(new Price(Currencies::TRY, 98));
$taxSubTotals->setTaxAmount(new Price('TRY', 17.64));
$taxSubTotals->setPercent(18);
$taxSubTotals->setTaxCategory($taxCategory);

$taxTotal = new TaxTotal();
$taxTotal->setTaxAmount(new Price('TRY', 17.64));
$taxTotal->setTaxSubtotal($taxSubTotals);

$item = new Item();
$item->setName('parfüm');

$line = new Line();
$line->setId('1');
$line->setNote('Ürün A');
$line->setInvoicedQuantity(new InvoicedQuantity('C62', 2));
$line->setLineExtensionAmount(new Price('TRY', 2 * 98));
$line->setTaxTotal($taxTotal);
$line->setItem($item);
$line->setPrice(new Price('TRY', 98));

$invoiceLines = new InvoiceLines();
$invoiceLines->setLine($line);
////////////////////// INVOICE LINES ////////////////////////////

////////////////////// TAXES ////////////////////////////
$taxesTaxCategory = new TaxCategory();
$taxesTaxCategory->setTaxExemptionReason('');
$taxesTaxCategory->setTaxScheme(new TaxScheme('KDV', '0015'));

$taxesTaxSubTotals = new TaxSubTotals();
$taxesTaxSubTotals->setTaxableAmount(new Price('TRY', 98));
$taxesTaxSubTotals->setTaxAmount(new Price('TRY', 5.88));
$taxesTaxSubTotals->setPercent(5);
$taxesTaxSubTotals->setTaxCategory($taxesTaxCategory);

$taxes = new Taxes();
$taxes->setWithholding(false);
$taxes->setTaxAmount(new Price('TRY', 5.88));
$taxes->setTaxSubTotals($taxesTaxSubTotals);
////////////////////// TAXES ////////////////////////////

////////////////////// INVOICE TOTALS ////////////////////////////
$invoiceTotals = new InvoiceTotals();
$invoiceTotals->setLineExtensionAmount(new Price('TRY', 2 * 98));
$invoiceTotals->setTaxExclusiveAmount(new Price('TRY', 2 * 98));
$invoiceTotals->setTaxInclusiveAmount(new Price('TRY', 2 * 98 * 1.18));
$invoiceTotals->setPayableAmount(new Price('TRY', 103.88));
////////////////////// INVOICE TOTALS ////////////////////////////

////////////////////// ORDER REFERENCE ////////////////////////////
$orderReference = new OrderReference();
$orderReference->setId('Odeme ID');
$orderReference->setIssueDate(Carbon::now()->format('Y-m-d'));
////////////////////// ORDER REFERENCE ////////////////////////////

////////////////////// NOTES ////////////////////////////
$notes = new Notes('Test Notes');
$notes->setNote('Test Notes 2');
////////////////////// NOTES ////////////////////////////

////////////////////// OPTIONS ////////////////////////////
$invoiceOptions = new Options('Iskonto', '2');
////////////////////// OPTIONS ////////////////////////////

////////////////////// ECOMMERCE INFO ////////////////////////////
$shipperInfo = new ShipperInfo();
$shipperInfo->setPartyName('Yurtiçi Kargo');
$shipperInfo->setSendingDate(Carbon::now()->format('Y-m-d'));
$shipperInfo->setIdentification(new Identification('VKN', '1461611967'));

$eCommerceInfo = new ECommerceInfo();
$eCommerceInfo->setWebUrl('http://www.example.com');
$eCommerceInfo->setPaymentAgentName('IYZICO');
$eCommerceInfo->setShipperInfo($shipperInfo);
////////////////////// ECOMMERCE INFO ////////////////////////////

////////////////////// CASH REGISTER INFO ////////////////////////////
$cashRegisterInfo = new CashRegisterInfo();
$cashRegisterInfo->setId('KN1234567890');
$cashRegisterInfo->setZId('1967');
$cashRegisterInfo->setSlipId('1923');
$cashRegisterInfo->setSlipDate(Carbon::now()->format('Y-m-d'));
////////////////////// CASH REGISTER INFO ////////////////////////////

$invoice = new Invoice();
$invoice->setRecipientInfo($recipientInfo);
$invoice->setSenderInfo($senderInfo);
$invoice->setInvoiceInfo($invoiceInfo);
$invoice->setInvoiceLines($invoiceLines);
$invoice->setTaxes($taxes);
$invoice->setInvoiceTotals($invoiceTotals);
$invoice->setOrderReference($orderReference);
$invoice->setNotes($notes);
$invoice->setOptions($invoiceOptions);
$invoice->setECommerceInfo($eCommerceInfo);
$invoice->setCashRegisterInfo($cashRegisterInfo);

$invoiceRawData = new Invoices($invoice);
$invoiceString = $invoiceRawData->getXML();
$invoiceRawData = base64_encode($invoiceString);

$corporateCode = config('digitalplanet.options.corporate_code');
/* E-FATURA İÇİN */
$SendInvoiceData = new SendXmlInvoice($corporateCode, $invoiceRawData);

/* E-ARŞİV FATURA İÇİN */
$SendInvoiceData = new SendEArchiveData($corporateCode, $invoiceRawData);

$response = $SendInvoiceData->send();
return $response->getSoapResult();
```
  
# digitalplanet
