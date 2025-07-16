#!/bin/sh

# === Sincroniza UID/GID no inicio do container ===
# Isso garante que o usuário www-data dentro do container tenha o mesmo UID/GID do seu usuário no host.

# Pega o UID/GID passado como argumento (do docker-compose.yml)
PUID=${PUID:-1000}
PGID=${PGID:-1000}

# Modifica o grupo www-data
if [ "$(id -g www-data 2>/dev/null)" != "$PGID" ]; then
    delgroup www-data 2>/dev/null || true # Tenta deletar, ignora erro se não existir
    addgroup -g "$PGID" www-data # Cria com o GID correto
fi

# Modifica o usuário www-data
if [ "$(id -u www-data 2>/dev/null)" != "$PUID" ]; then
    deluser www-data 2>/dev/null || true # Tenta deletar, ignora erro se não existir
    adduser -u "$PUID" -G www-data -s /bin/sh -D www-data # Cria com o UID/GID corretos
fi

# Ajusta as permissões de ownership e ACLs para o volume montado
# Isso é importante para garantir que o www-data e o seu usuário do host
# tenham permissão de escrita e leitura nas pastas do Laravel.
chown -R www-data:www-data /var/www/html
chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Permissões ACL para o usuário do host (PUID) e grupo www-data (PGID)
# O '|| true' ignora erros se setfacl não for totalmente suportado no sistema de arquivos host
setfacl -Rm d:u:"$PUID":rwX,d:g:"$PGID":rwX,u:"$PUID":rwX,g:"$PGID":rwX /var/www/html/storage /var/www/html/bootstrap/cache || true
setfacl -Rm d:u:"$PUID":rwX,d:g:"$PGID":rwX,u:"$PUID":rwX,g:"$PGID":rwX /var/www/html || true

# Executa o comando principal do contêiner (PHP-FPM neste caso)
exec "$@"