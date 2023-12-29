<?php declare(strict_types=1);

include('User.php');

function genId($array) {
    return count($array) + 1;
}

class UserRepository{

    public array $users = [];
    
    public function create(string $name, string $last_name, string $birthdate, string $identity_card, string $email, string $password): string {

        $user = new User();
        $user->name = $name;
        $user->last_name = $last_name;
        $user->birthdate = $birthdate;
        $user->identity_card = $identity_card;
        $user->email = $email;
        $user->password = $password;
        $user->id = genId($this->users);
        array_push($this->users, $user);

        return 'Created';
    }
    public function update(string $name, string $last_name, string $birthdate, string $identity_card, string $email, string $password, int $id): string {

        $user = new User();
        $user->name = $name;
        $user->last_name = $last_name;
        $user->birthdate = $birthdate;
        $user->identity_card = $identity_card;
        $user->email = $email;
        $user->password = $password;
        $user->id = $id;

        foreach($this->users as &$item) {
            if ($item->id == $id) {
                $key = key($this->users);
                

                unset($this->users[$key]);
                array_push($this->users, $user);
                break;
            } else {
                throw new \InvalidArgumentException('User not fund');
            }
        }

        return 'Updated';
    }
    public function remove(int $id): string {

        
        
        foreach($this->users as $item) {
           
            if ($item->id == $id) {
                $key = key($this->users);

                unset($this->users[$key]);
                break;
            } else {
                throw new \InvalidArgumentException('User not fund');
            }
        }

        return 'Removed';
    }
}

$userRepository = new UserRepository();

?>