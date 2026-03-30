# 🚀 Laravel + Firebase + Redis (Docker)

Aplicação desenvolvida com **Laravel**, integrada ao **Firebase Realtime Database** e utilizando **Redis** para cache, totalmente containerizada com Docker.

---

## 📦 Tecnologias utilizadas

* PHP (Laravel)
* Firebase Realtime Database
* Redis
* Docker & Docker Compose
* Nginx

---

## ⚙️ Pré-requisitos

Antes de começar, você precisa ter instalado:

* Docker
* Docker Compose
* Git

---

## 🚀 Como rodar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

---

### 2. Configurar ambiente

Copie o arquivo de exemplo:

```bash
cp .env.example .env
```

---

### 3. Configurar Firebase

* Baixe o arquivo de credenciais do Firebase (Service Account JSON)
* Coloque o arquivo em:

```bash
storage/app/firebase-credentials.json
```

* Configure no `.env`:

```env
FIREBASE_CREDENTIALS=storage/app/firebase-credentials.json
FIREBASE_DATABASE_URL=https://seu-projeto.firebaseio.com
```

---

### 4. Subir os containers

```bash
docker-compose up -d --build
```

---

### 5. Instalar dependências

```bash
docker exec -it laravel_app composer install
```

---

### 6. Gerar chave da aplicação

```bash
docker exec -it laravel_app php artisan key:generate
```

---

### 7. Acessar aplicação

Abra no navegador:

👉 http://localhost:8000

---

## ⚡ Cache com Redis

O projeto utiliza Redis para:

* Cache de dados
* Sessões
* Filas (queue)

---

## 🔒 Segurança

Os seguintes arquivos NÃO são versionados:

* `.env`
* `firebase-credentials.json`
* `database.sqlite`

---

## 📌 Observações

* O Firebase é utilizado como banco de dados principal
* O SQLite pode ser usado apenas para sessões (caso configurado)
* Redis é recomendado para melhor performance

---

## 👨‍💻 Autor

Desenvolvido por Luciano Costa

