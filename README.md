# PHP - Protegendo dados sensíveis em PDF

Uma versão aprimorada para proteção de PDFs que contém dados sensíveis.

# Benefícios

Proteão e Criptografia 

Utiliza funções OpenSSL

## Instalação

Para instalar esta dependência basta executar o comando abaixo:
```shell
composer require setasign/fpdi-protection
```

## Utilização

Para usar este gerenciador basta seguir o exemplo abaixo:
```php
<?php
require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS
use setasign\FpdiProtection\FpdiProtection;

//INSTÂNCIA
$pdf = new FpdiProtection();

//Diretório dos arquivos (PDFs)
$src_file = '../dirPDF/pdfs/apostila_latex.pdf';

//Diretório de destino
$dest_file = '../dirPDF/pdfsProtegidos/';

$ownerPassword = $pdf->setProtection(
    FpdiProtection::PERM_PRINT | FpdiProtection::PERM_COPY,
    '123456',
    '012345'
);

//Retorna a senha do proprietário
var_dump($ownerPassword);

```

## Requisitos
- Necessário PHP 5.6 ou superior