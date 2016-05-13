<?php

namespace Server
{
    /**
     * Implement the Data Source interface using PDO
     */
    class CartDataPDO implements ICartDataSource
    {
        /**
         * Construct a new instance with the path to the files
         */
        function __construct($config)
        {
            try {
                $this->_db = new \PDO( $config['dsn'], $config['user'], $config['password']);
            }
            catch (\PDOException $e) {
                print '\n\nConnection failed: ' . $e->getMessage();
                die();
            }
       }

        /**
         * Saves the active cart
         */
        public function saveCart($cart) {

            $itemsJson = json_encode($cart->_items);
            $stmt = $this->_db->prepare("UPDATE Carts SET items=? WHERE id=?;");
            $stmt->bindParam(1, $itemsJson);
            $stmt->bindParam(2, $cart->cartId );
            $stmt->execute();
        }

        /**
         * Loads the requested Cart. If cart doesn't exist, creates a new one
         */
        public function getCart($cartId) {
            $sql = "SELECT * FROM Carts WHERE id = ".$cartId." LIMIT 1;";
            $results = $this->_db->query($sql);
            if ( $results->rowCount() == 0 ) {
                $result = $this->createNewCart();
            }
            return $this->cartFromDB($results->fetch(0));
        }

        /**
         * Returns the last known cart in the DB
         */
        public function getLastCart() {
            $results = $this->_db->query('SELECT * FROM Carts ORDER BY id DESC LIMIT 1;');
            if ( $results->rowCount() == 0 ) {
                $results = $this->createNewCart();
            }
            return $this->cartFromDB($results->fetch(0));
        }

        private function cartFromDB($dbCart) {
            $cart = new Cart($dbCart['id']);
            $cart->_items = json_decode($dbCart['items']);
            return $cart;
        }

        private function createNewCart() {
            $this->_db->beginTransaction();
            $this->_db->exec("insert into Carts (items) values ('[]');");
            $results = $this->_db->query('SELECT * FROM Carts ORDER BY id DESC LIMIT 1;');
            $this->_db->commit();
            return $results;
        }

    }

}