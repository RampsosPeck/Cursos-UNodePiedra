
<?php
/**
 *  VueTables server-side component interface
 */
namespace Unopicursos\VueTables;

interface VueTablesInterface {
    public function get($model, array $fields, Array $relation = []);
}