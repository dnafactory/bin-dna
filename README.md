# DNA System ToolKit

Yet another System ToolKit

Under development

## Setup

`mv envs/connections.php.example envs/connections.php`
`mv envs/me.php.example envs/me.php`

`chmod +x dna`
`ln -s dna /usr/local/bin/dna`

## Command list

### Command on DataBase

`dna db:create:database dbname username`
`dna db:drop:database dbname`
`dna db:drop:user username`
`dna db:dump:database dbname filename --compress=0`
`dna db:show:connections`
`dna db:show:databases`
`dna db:show:users`

### Command on FileSystem

`dna fs:create:dump-tar-gz source destination`

### Command on System

`dna system:create:webroot`
`dna system:enable:xdebug`
`dna system:disable:xdebug`

