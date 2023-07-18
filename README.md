# Itau Library Test

[![Maintainer](http://img.shields.io/badge/maintainer-@leandroferreirama-blue.svg?style=flat-square)](https://twitter.com/leandroferreirama)
[![Source Code](http://img.shields.io/badge/source-leandroferreirama/itau%E2%80%93auth-blue.svg?style=flat-square)](https://github.com/leandroferreirama/itau-auth)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/leandroferreirama/itau-auth.svg?style=flat-square)](https://packagist.org/packages/leandroferreirama/itau-auth)
[![Latest Version](https://img.shields.io/github/release/leandroferreirama/itau-auth.svg?style=flat-square)](https://github.com/leandroferreirama/itau-auth/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/leandroferreirama/itau-auth.svg?style=flat-square)](https://scrutinizer-ci.com/g/leandroferreirama/itau-auth)
[![Quality Score](https://img.shields.io/scrutinizer/g/leandroferreirama/itau-auth.svg?style=flat-square)](https://scrutinizer-ci.com/g/leandroferreirama/itau-auth)
[![Total Downloads](https://img.shields.io/packagist/dt/leandroferreirama/itau-auth.svg?style=flat-square)](https://packagist.org/packages/cleandroferreirama/itau-auth)

###### Itau Auth Library is a small set of classes developed for integration into the webservice of Itau..

Itau Auth Library é um pequeno conjunto de classes desenvolvidas para integração ao webservice do itau.


### Highlights

- Simple installation (Instalação simples)
- Abstraction of all API methods (Abstração de todos os métodos da API)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"leandroferreirama/itau-auth": "^1.0"
```

or run

```bash
composer require leandroferreirama/itau-auth
```

## Documentation

###### For more details on how to use it, see an example folder in the component's directory. There will be an example of using the class.
###### It works in two steps: The first step consists of requesting the user's authorization using the link generated as shown below.
###### Put that link and an a tag in the href.

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso da classe. 
O funcionamento está dividido em duas etapas: A primeira etapa consiste em solicitar a autorização do usuário usando o link gerado conforme demonstrado abaixo. 
Coloque esse link e uma tag a no href.

#### Generate url:

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use LeandroFerreiraMa\ItauAuth\Auth;

$url = (new Auth)->url(GOOGLE_CLIENT_ID, GOOGLE_CLIENT_REDIRECT_URL);

```
###### After the user authorizes the use, itau will redirect to the return URL containing a variable with an authorization code. To receive the token, include the following code in the file:

Após o usuário autorizar o uso, o itau redirecionará para a URL de retorno contendo uma variável com um código de autorização. Para receber o token, inclua no arquivo o seguinte código:

#### Access Token:

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

if(isset($_GET['code'])){
    $data = (new Auth)->accessToken(GOOGLE_CLIENT_ID, GOOGLE_CLIENT_REDIRECT_URL, GOOGLE_CLIENT_SECRET, $_GET['code']);
    $token = $data->access_token;
    $refresh_token = $data->refresh_token;
}
```

#### Refresh Token:

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

    $data = (new Auth)->refreshToken(GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET, $refresh_token);
    $token = $data->access_token;
}
```

### Others

## Contributing

Please see [CONTRIBUTING](https://github.com/leandroferreirama/itau-auth/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email suporte@integracaosistema.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para suporte@integracaosistema.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Leandro F. Marcelli](https://github.com/leandroferreirama) (Developer)
- [All Contributors](https://github.com/leandroferreirama/itau-auth/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/leandroferreirama/itau-auth/blob/master/LICENSE) for more information.