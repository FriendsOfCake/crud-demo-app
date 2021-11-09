<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Comments seed.
 */
class CommentsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'post_id' => '5',
                'name' => 'amaze!',
                'body' => 'weee',
                'created' => '2014-04-18 12:00:00',
                'modified' => '2014-04-17 17:46:31',
            ],
            [
                'id' => '2',
                'post_id' => '35',
                'name' => 'nice',
                'body' => 'device',
                'created' => '2014-04-17 18:01:46',
                'modified' => '2014-04-17 18:01:46',
            ],
            [
                'id' => '3',
                'post_id' => '35',
                'name' => 'amaze',
                'body' => 'weeee',
                'created' => '2014-04-17 18:02:01',
                'modified' => '2014-04-17 18:02:01',
            ],
            [
                'id' => '4',
                'post_id' => '5',
                'name' => 'nice kit',
                'body' => 'weee',
                'created' => '2014-04-17 18:08:43',
                'modified' => '2014-04-17 18:08:43',
            ],
            [
                'id' => '5',
                'post_id' => '5',
                'name' => 'much amaze',
                'body' => 'weee',
                'created' => '2014-04-17 18:16:52',
                'modified' => '2014-04-17 18:16:52',
            ],
            [
                'id' => '6',
                'post_id' => '26',
                'name' => 'amaze',
                'body' => 'much comment',
                'created' => '2014-04-17 18:51:54',
                'modified' => '2014-04-17 18:51:54',
            ],
        ];

        $table = $this->table('comments');
        $table->insert($data)->save();
    }
}
