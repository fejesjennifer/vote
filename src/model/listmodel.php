<?php
require('mysql/Database.php');

class listmodel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getQuestions()
    {
        $this->db->query("SELECT `kerdesek`.`id`,`kerdesek`.`text`,
                                SUM(CASE WHEN `szavazatok`.`type`= 'upvote' then 1 else 0 end ) as up,
                                SUM(CASE WHEN `szavazatok`.`type`= 'downvote' then 1 else 0 end ) as down
                                FROM `szavazatok`
                                INNER JOIN `kerdesek` ON `szavazatok`.`questionid`=`kerdesek`.`id`
                                GROUP BY `kerdesek`.`id`
                                ORDER BY up DESC;");
        return $this->db->multipleResult();
    }

public function up($questionid)
{
    $this->db->query("INSERT INTO `szavazatok`(`id`,`questionid`,`type`) VALUES (NULL,$questionid,'upvote')");
    $this->db->execute();
}

    public function down($questionid)
    {
        $this->db->query("INSERT INTO `szavazatok`(`id`,`questionid`,`type`) VALUES (NULL,$questionid,'downvote')");
        $this->db->execute();
    }

}

?>

