## Installation Guide
Clone the repository using Github Desktop or the command `git clone https://github.com/markpenales/team-building-qr-scanner.git`
    
1. If an error occurs, create your own [Personal Access Token.](https://docs.github.com/en/enterprise-server@3.6/authentication/keeping-your-account-and-data-secure/managing-your-personal-access-tokens)
2. Then run the command `git clone https://<PERSONAL_ACCESS_TOKEN>@github.com/markpenales/team-building-qr-scanner.git`. Note: Replace the `<PERSONAL_ACCESS_TOKEN>` with the generated token.
3. Copy and paste the `.env.example` file and rename the copied file `.env`
4. Run `composer install`
5. Run the command `php artisan migrate`, `php artisan db:seed` and `php artisan serve`
