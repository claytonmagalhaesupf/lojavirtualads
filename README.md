# Apresentação - Loja Virtual

Este repositório contém a aplicação Laravel usada no trabalho. Abaixo estão os pontos principais que você deve apresentar, como rodar o projeto e onde encontrar as alterações realizadas.

**Visão Geral**
- **Funcionalidade principal:** CRUD de fornecedores, upload de imagem para produtos e página pública de listagem de produtos com filtro por tipo.
- **Stack:** Laravel 12 (PHP 8.2), Breeze, Tailwind CSS. Assets via Vite.

**Principais arquivos alterados**
- **Views (público):** [resources/views/welcome.blade.php](resources/views/welcome.blade.php) — página pública com grid de produtos, busca e filtro por `type_id`.
- **Controllers:** [app/Http/Controllers/PublicProductController.php](app/Http/Controllers/PublicProductController.php) — controller público de listagem.
- **Products:** [app/Models/Product.php](app/Models/Product.php) e [app/Http/Controllers/ProductsController.php](app/Http/Controllers/ProductsController.php) — suporte a `image` e validações atualizadas.
- **Suppliers CRUD:** migration, model e controller em `database/migrations/*_create_suppliers_table.php`, [app/Models/Supplier.php](app/Models/Supplier.php), [app/Http/Controllers/SupplierController.php](app/Http/Controllers/SupplierController.php), views em `resources/views/suppliers/`.
- **Migrations adicionadas:**
  - `2026_06_21_000000_create_suppliers_table.php`
  - `2026_06_21_000001_add_supplier_id_to_products.php`
  - `2026_06_21_000002_add_image_to_products.php`

**O que demonstrar na apresentação**
- Mostrar a página pública (`/`) com produtos, filtro por tipo e imagens.
- Demonstrar o CRUD de fornecedores (criar, editar, listar, remover) na área autenticada.
- Mostrar upload de imagem ao criar/editar produto e exibição do thumbnail na listagem.
- Explicar como as validações previnem erros (ex.: limites em `quantity` e validação de `price`).

**Como rodar (ambiente com Docker)**
1. Levante containers (se não estiverem ativos):
```bash
docker-compose up -d
```
2. Rodar migrations dentro do container `app`:
```bash
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan storage:link
```
3. Compilar assets (no host ou no container):
```bash
# no host
npm run dev
# ou no container
docker-compose exec app npm run dev
```
4. Abrir: http://localhost:8000/

**Testes rápidos durante a apresentação**
- Criar um produto autenticado (entrar) com imagem — verificar `storage/app/public/` e a exibição em `/`.
- Mostrar listagem de fornecedores em `resources/views/suppliers/index.blade.php` e criação via formulário.

**Comandos úteis**
- Rodar testes (Pest): `docker-compose exec app php artisan test --compact`.
- Ver status das migrations: `docker-compose exec app php artisan migrate:status`.

**Notas de implementação / observações**
- Mantivemos o Tailwind (padrão Breeze) — não foi adicionado Bootstrap.
- O arquivo público `welcome.blade.php` foi ajustado para usar o slot `header` do layout Breeze e cards responsivos com classes Tailwind.
- Se a página apresentar imagens faltando, verifique se `php artisan storage:link` foi executado e se a pasta `storage/app/public/products` contém os arquivos.

**Próximos passos (opcionais)**
- Adicionar paginação na listagem pública.
- Página de detalhe do produto (show) com descrição completa.
- Testes automatizados cobrindo upload e validações.

---
Se quiser, eu gero um slide curto (3-5 slides) com esses pontos para apresentar — quer que eu gere? <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

novas palavras