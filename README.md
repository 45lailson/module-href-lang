# Modulo Identificador de Língua(Idioma)

O objetivo desse modulo para Magento 2, é identificar qual língua atual está sendo carregada e exibir um padrão de "meta-tag" para páginas CMS em Multi Sites.


# Features

 - [x] Adicione um bloco à head;
 - [x] O bloco deve ser capaz de identificar o id da página CMS e verificar se a página é usada em múltiplos views/stores loja;
 - [x] Adicionar uma meta tag hreflang ao cabeçalho;
 - [x] Se a metatag for exibida - ela deve exibir o idioma da loja, como “en-gb”, “en-us”, etc. As metatag devem ter valores específicos para cada país;
 - [x] Apoie o fato de que cada loja deve ter um par de idiomas diferente.


## Instalação via Composer

Para instalar via composer devemos editar o **composer.json** do seu projeto Magento.

Edite o arquivo `composer.json` **na raiz do Magento** e busque pelo bloco `repositories`

Originalmente ela é assim:

```json
    ...
    "repositories": [
        {
            "type": "composer",
            "url": "https://repo.magento.com/"
        }
    ],
    ...
```
Adicione a linha abaixo:
```json
{
	"type": "vcs",
	"url": "https://github.com/45lailson/module-href-lang.git"
}
```

Resultado final para o bloco `repositories` vai ficar assim:

```json
    ...
    "repositories": [
        {
            "type": "composer",
            "url": "https://repo.magento.com/"
        },
        {
	    "type": "vcs",
	    "url": "https://github.com/45lailson/module-href-lang.git"
	}
    ],
    ...
```
Procure o bloco `require`, informa ao composer para instalar seu pacote. Exemplo:

```json
    ...
    
    "require": {
        "45lailson/module-href-lang": "^1.0.0",
        "magento/product-community-edition": "2.3.5-p2",
    },

    ...
```

Para concluir a instalação execute o comando abaixo que o seu pacote seja instalado no Magento.
```bash
$ composer update
```
## Instalação via .zip

Para instalar via arquivos devemos realizar o download do modulo, baixando diretamente do [repo](https://github.com/45lailson/module-href-lang). Iremos realizar o wget para fazer o download.

Utilizando o 'wget' como exemplo abaixo:
```bash
$ wget https://github.com/45lailson/module-href-lang/archive/master.zip
```
Descompacte os arquivos na **raiz** do seu Magento dentro da pasta **app/code** do seu projeto Magento.

## Habilitando Instalação

Para finalizar a instalação execute os comando abaixo dentro da pasta raiz do seu Magento.
```bash
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```
