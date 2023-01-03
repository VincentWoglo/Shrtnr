<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Urls extends AbstractMigration
{
    public function up()
    {
        // create the table
        $table = $this->table('linkgenerated');
        $table->addColumn('SlugGenerated', 'string')
              ->addColumn('OriginalUrl', 'string')
              ->create();
    }
}
