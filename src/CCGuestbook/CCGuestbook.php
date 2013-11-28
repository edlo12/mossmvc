<?php
    /**
    * A guestbook controller as an example to show off some basic controller and model-stuff.
    *
    * @package LydiaCore
    */
class CCGuestbook extends CObject implements IController, IHasSQL {

      private $pageTitle = 'Mossmvc Guestbook Example';
      private $pageHeader = '<h1>Guestbook Example</h1><p>Showing off how to implement a guestbook in Mossmvc.</p>';
      private $pageMessages = '<h2>Current messages</h2>';

     

      /**
       * Constructor
       */
      public function __construct() {
        parent::__construct();
      }
     

      /**
       * Implementing interface IController. All controllers must have an index action.
       */
      public function Index() {
            $this->data['title'] = $this->pageTitle;

    // Include the file and store it in a string using output buffering
    $entries = $this->ReadAllFromDatabase();
    $formAction = $this->request->CreateUrl('guestbook/handler');
    ob_start();
    include __DIR__ . '/index.tpl.php';
    $this->data['main'] = ob_get_clean();
    
      }
    
      /**
       * Handle posts from the form and take appropriate action.
       */
      public function Handler() {
        if(isset($_POST['doAdd'])) {
          $this->SaveNewToDatabase(strip_tags($_POST['newEntry']));
        }
        elseif(isset($_POST['doClear'])) {
          $this->DeleteAllFromDatabase();
        }           
        elseif(isset($_POST['doCreate'])) {
          $this->CreateTableInDatabase();
        }           
        header('Location: ' . $this->request->CreateUrl('guestbook'));
      }
      /**
       * Save a new entry to database.
       */
      private function CreateTableInDatabase() {
        try {
          $this->db->ExecuteQuery(self::SQL('create table guestbook'));
        } catch(Exception$e) {
          die("$e<br/>Failed to open database: " . $this->config['database'][0]['dsn']);
        }
      }      
      /**
       * Save a new entry to database.
       
      private function CreateTableInDatabase() {
        try {
          $db = new PDO($this->config['database'][0]['dsn']);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
     
          $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS Guestbook (id INTEGER PRIMARY KEY, entry TEXT, created DATETIME default (datetime('now')));");
          $stmt->execute();
        } catch(Exception$e) {
          die("Failed to open database: " . $this->config['database'][0]['dsn'] . "</br>" . $e);
        }
      }
      */
      /**
       * Save a new entry to database.
       */
      private function SaveNewToDatabase($entry) {
        $this->db->ExecuteQuery(self::SQL('insert into guestbook'), array($entry));
        if($this->db->rowCount() != 1) {
          echo 'Failed to insert new guestbook item into database.';
        }
      }
      /**
       * Save a new entry to database.
       
      private function SaveNewToDatabase($entry) {
        $db = new PDO($this->config['database'][0]['dsn']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $stmt = $db->prepare('INSERT INTO Guestbook (entry) VALUES (?);');
        $stmt->execute(array($entry));
        if($stmt->rowCount() != 1) {
          die('Failed to insert new guestbook item into database.');
        }
      }*/
           /**
       * Delete all entries from the database.
       */
      private function DeleteAllFromDatabase() {
        $this->db->ExecuteQuery(self::SQL('delete from guestbook'));
      }
      /**
       * Delete all entries from the database.
       
      private function DeleteAllFromDatabase() {
        $this->db->ExecuteQuery('DELETE FROM Guestbook;');
      }*/
      /**
       * Delete all entries from the database.
       
      private function DeleteAllFromDatabase() {
        $db = new PDO($this->config['database'][0]['dsn']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $stmt = $db->prepare('DELETE FROM Guestbook;');
        $stmt->execute();
      }*/
      
      /**
       * Read all entries from the database.
       */
      private function ReadAllFromDatabase() {
        try {
          $this->db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('select * from guestbook'));
        } catch(Exception $e) {
          return array();   
        }
      }
      /**
       * Read all entries from the database.
       
      private function ReadAllFromDatabase() {
        try {
          $db = new PDO($this->config['database'][0]['dsn']);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
          $stmt = $db->prepare('SELECT * FROM Guestbook ORDER BY id DESC;');
          $stmt->execute();
          $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $res;
        } catch(Exception $e) {
          return array();
        }
      }*/
      
       /**
        * Implementing interface IHasSQL. Encapsulate all SQL used by this class.
        *
        * @param string $key the string that is the key of the wanted SQL-entry in the array.
        */
      public static function SQL($key=null) {
         $queries = array(
            'create table guestbook'  => "CREATE TABLE IF NOT EXISTS Guestbook (id INTEGER PRIMARY KEY, entry TEXT, created DATETIME default (datetime('now')));",
            'insert into guestbook'   => 'INSERT INTO Guestbook (entry) VALUES (?);',
            'select * from guestbook' => 'SELECT * FROM Guestbook ORDER BY id DESC;',
            'delete from guestbook'   => 'DELETE FROM Guestbook;',
         );
         if(!isset($queries[$key])) {
            throw new Exception("No such SQL query, key '$key' was not found.");
          }
          return $queries[$key];
       }
} 