<?php
class ProjectTest extends CDbTestCase{
    public $fixtures=array(
        'users'=>'User',
    );

    public function testCRUD(){

    //Create a new user
        $newUser = new User;
        $newUserName = 'test user';
        $newUserEmail = 'test@test.com';
        $newPassWord = 'password';
        $newUser->setAttributes(
            array(
                'name' => $newUserName,
                'email' => $newUserEmail,
                'password' => $newPassWord
            )
          );
        $this->assertTrue($newUser->save(false));

        //Read back the newly created project
        $retrievedUser=User::model()->findByPk($newUser->id);
        $this->assertTrue($retrievedUser instanceof User);
        $this->assertEquals($newUserName, $retrievedUser->name);
    }

    public function testRead(){
        //read an user
        $retrievedUser = $this->users('user1');
        $this->assertTrue($retrievedUser instanceof User);
        $this->assertEquals('Test User 1', $retrievedUser->name);
    }

    public function testUpdate(){
        //UPDATE the newly created project
        $updatedUserName = 'Updated User name 1';
        $user = $this->users('user2');
        $user->name = $updatedUserName;
        $this->assertTrue($user->save(false));
        $updatedUser = User::model()->findByPk($user->id);
        $this->assertTrue($updatedUser instanceof User);
        $this->assertEquals($updatedUserName, $updatedUser->name);
    }

    public function testDelete(){

        //DELETE the project
        $user = $this->users('user3');
        $savedUserId = $user->id;
        $this->assertTrue($user->delete());
        $deletedUser = User::model()->findByPk($savedUserId);
        $this->assertEquals(NULL, $deletedUser);

    }


}
