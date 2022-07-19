# Нативное использование PHPUnit

### **Установка PHPUnit**
На момент написания данной инструкции использовалась версия [PHPUnit 9](https://phpunit.de/getting-started/phpunit-9.html).
Для установки необходимо использовать **[composer:](https://getcomposer.org/)**

`composer require --dev phpunit/phpunit ^9`

### **Использование**
Тесты каждого целевого компонента должны объединяться в одном классе, расширяющем класс `PHPUnit\Framework\TestCase`.

Имя тестируемого класса необходимо (необязательно, но так принято) употреблять в названии теста.

Минимальный класс для контрольного примера:
```
namespace App;

use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    private $store;

    // Автоматически вызывается перед выполнением каждого тестового метода
    public function setUp()
    {
        $this->store = new UserStore();
    }

    // Автоматически вызывается после выполнения каждого тестового метода
    public function tearDown()
    {
        
    }
    
    // Тестовый метод
    public function testGetUser()
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");
        $this->assertEquals($user['mail'], "a@b.com");
        $this->assertEquals($user['name'], "bob williams");
        $this->assertEquals($user['pass'], "12345");
    }
}
```