<?php

include('src/UserRepository.php');
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function test_user_can_be_created() {
        $user = new UserRepository();  
        $this->assertEquals('Created', $user->create('Brayan', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!'));
        $this->assertIsArray($user->users);
        $this->assertEquals(1, count($user->users));
        $this->assertNotNull($user->users[0]->name);
    }
    public function test_user_can_be_updated() {
        $user = new UserRepository();  
        $user->create('Brayan', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!');
        $this->assertEquals(1, $user->users[0]->id);
        $this->assertEquals('Updated', $user->update('Marlon', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!', 1));
        $this->assertEquals(1, $user->users[1]->id);
        $this->assertEquals('Marlon', $user->users[1]->name);

    }
    public function test_user_updated_by_id_not_fund() {
        $user = new UserRepository();  
        $user->create('Brayan', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!');
        $this->expectException(\InvalidArgumentException::class);
        $user->update('Marlon', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!', 2);

    }
    public function test_user_can_be_removed() {
        $user = new UserRepository();  
        $user->create('Brayan', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!');
        $this->assertEquals('Removed', $user->remove(1));
        $this->assertEquals(0, count($user->users));

    }
    public function test_user_removed_by_id_not_fund() {
        $user = new UserRepository();  
        $user->create('Brayan', 'Rojas', '25-07-2001', '28331165', 'brayanmontilla26@gmail.com', 'pass123!');
        $this->expectException(\InvalidArgumentException::class);
        $user->remove(2);

    }
}