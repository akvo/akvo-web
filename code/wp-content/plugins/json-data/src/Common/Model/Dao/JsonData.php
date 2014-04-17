<?php
namespace JsonData\Common\Model\Dao;

/**
 * Description of JsonData
 *
 * @author Jayawi Perera
 */
class JsonData {

	const PARTIAL_TABLE_NAME = 'json_data';
	const PARTIAL_LOG_TABLE_NAME = 'json_data_log';
	const PARTIAL_QUEUE_TABLE_NAME = 'json_data_queue';

	protected $_sTableName = null;
	protected $_sLogTableName = null;
	protected $_sQueueTableName = null;

	public function __construct () {

		global $wpdb;

		if (is_null($this->_sTableName)) {
			$this->_sTableName = $wpdb->prefix . self::PARTIAL_TABLE_NAME;
		}
		if (is_null($this->_sLogTableName)) {
			$this->_sLogTableName = $wpdb->prefix . self::PARTIAL_LOG_TABLE_NAME;
		}
		if (is_null($this->_sQueueTableName)) {
			$this->_sQueueTableName = $wpdb->prefix . self::PARTIAL_QUEUE_TABLE_NAME;
		}
	}

	public function fetchAllFeeds () {

		global $wpdb;

		$sQuery = "SELECT * FROM `" . $this->_sTableName."`";
		//$sQuery = $wpdb->prepare($sQuery);

		$aResults = $wpdb->get_results($sQuery, ARRAY_A);
		return $aResults;

	}
	public function fetchFeed ($iId) {

		global $wpdb;

		$sQuery = "SELECT * FROM `" . $this->_sTableName . "` WHERE `id` = %d";
		$sQuery = $wpdb->prepare($sQuery , $iId);

		$aResults = $wpdb->get_row($sQuery, ARRAY_A);
		return $aResults;

	}

	public function fetchFeedBySlug ($sFeedSlug) {


		global $wpdb;

		$sQuery = "SELECT * FROM `" . $this->_sTableName . "` WHERE `feed_slug` = %s";
		$sQuery = $wpdb->prepare($sQuery , $sFeedSlug);

		$aResults = $wpdb->get_row($sQuery, ARRAY_A);
		return $aResults;

	}



	public function insertFeed ($aInsertData) {

		global $wpdb;

		$bStatus = $wpdb->insert($this->_sTableName, $aInsertData);
		if ($bStatus) {
			return $wpdb->insert_id;
		}
		return $bStatus;

	}

	public function updateFeed ($aUpdateData, $iId) {

		global $wpdb;

		$bStatus = $wpdb->update($this->_sTableName, $aUpdateData, array('id' => $iId));

		return $bStatus;

	}

	public function deleteFeed ($iId) {

		global $wpdb;

		$bStatus = $wpdb->delete($this->_sTableName, array('id' => $iId));

		return $bStatus;

	}

	public function createTable () {

		global $wpdb;

		$sCreateStatement =
			"CREATE TABLE IF NOT EXISTS `" . $this->_sTableName . "` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`feed_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				`feed_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				`feed_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				`feed_update_interval` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				`feed_parameters` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				`date_created` datetime NOT NULL,
				`date_updated` datetime NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

		$wpdb->query($sCreateStatement);

		$sCreateStatement =
			"CREATE TABLE IF NOT EXISTS `" . $this->_sLogTableName . "` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`json_data_id` int(11) COLLATE utf8_unicode_ci NOT NULL,
				`feed_data` TEXT COLLATE utf8_unicode_ci NOT NULL,
				`date_updated` datetime NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

		$wpdb->query($sCreateStatement);

		$sCreateStatement =
			"CREATE TABLE IF NOT EXISTS `".$this->_sQueueTableName."` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `json_data_id` int(11) NOT NULL,
                `parameters` varchar(255) NOT NULL,
                `last_update_time` datetime NOT NULL,
                `last_display_time` datetime NOT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

		$wpdb->query($sCreateStatement);



	}
    
    public function synctable(){
        global $wpdb;
        $sQuery = "SHOW COLUMNS FROM `".$this->_sQueueTableName."` LIKE 'last_display_time'";
        $aResults = $wpdb->get_results($sQuery, ARRAY_A);
        if(!$aResults){
            $wpdb->query("ALTER TABLE `".$this->_sQueueTableName."` ADD `last_display_time` datetime NOT NULL");
        }
        //echo $sQuery;
        
    }

	public function deleteTable () {

		global $wpdb;

		$sDropStatement = "DROP TABLE IF EXISTS `" . $this->_sTableName . "`;";
		$wpdb->query($sDropStatement);
		$sDropStatement = "DROP TABLE IF EXISTS `" . $this->_sLogTableName . "`;";
		$wpdb->query($sDropStatement);
		$sDropStatement = "DROP TABLE IF EXISTS `" . $this->_sQueueTableName . "`;";
		$wpdb->query($sDropStatement);

	}

	public function getAllFeedNames () {
		global $wpdb;

		$sQuery = "SELECT feed_name, feed_slug FROM `" . $this->_sTableName."`";
		$aResults = $wpdb->get_results($sQuery, ARRAY_A);
		return $aResults;
	}

	public function insertJsonDataQueue($aInsertData) {
		global $wpdb;

		$bStatus = $wpdb->insert($this->_sQueueTableName, $aInsertData);
		if ($bStatus) {
			return $wpdb->insert_id;
		}
		return $bStatus;
	}
    
    public function fetchAllFeedQueueIDs () {
		global $wpdb;

		$sQuery = "SELECT id FROM `" . $this->_sQueueTableName."`";
        $aResults = $wpdb->get_results($sQuery, ARRAY_A);
        $aIDs = array();
        foreach($aResults AS $aResult){
            $aIDs[]=$aResult['id'];
        }
		return $aIDs;
	}
    
    public function fetchFeedQueue ($iFeedId) {
		global $wpdb;

		$sQuery = "SELECT * FROM `" . $this->_sQueueTableName."` WHERE `json_data_id` = %d";
		$sQuery = $wpdb->prepare($sQuery , $iFeedId);
        $aResults = $wpdb->get_results($sQuery, ARRAY_A);
		return $aResults;
	}
    
    public function fetchSingleFeedQueue ($iFeedQueueId) {
		global $wpdb;

		$sQuery = "SELECT * FROM `" . $this->_sQueueTableName."` WHERE `id` = %d";
		$sQuery = $wpdb->prepare($sQuery , $iFeedQueueId);
        $aResults = $wpdb->get_row($sQuery, ARRAY_A);
		return $aResults;
	}
    public function fetchSingleFeedQueueByParams ($iFeedId,$sSerializedParams) {
		global $wpdb;

		$sQuery = "SELECT * FROM `" . $this->_sQueueTableName."` WHERE `json_data_id` = %d AND `parameters` = %s";
        $sQuery = $wpdb->prepare($sQuery , $iFeedId, $sSerializedParams);
		$aResults = $wpdb->get_row($sQuery, ARRAY_A);
		return $aResults;
	}
    
    
    public function updateFeedQueue ($aUpdateData,$iQueueId) {
        global $wpdb;

		$bStatus = $wpdb->update($this->_sQueueTableName, $aUpdateData, array('id' => $iQueueId));

		return $bStatus;

	}
    
    public function updateDisplayTime($iFeedQueueId){
        global $wpdb;
        $aUpdateData['last_display_time']=date('Y-m-d H:i:s');
		$bStatus = $wpdb->update($this->_sQueueTableName, $aUpdateData, array('id' => $iFeedQueueId));

		return $bStatus;
    }
    
    public function deleteFeedQueue ($iFeedQueueId) {

		global $wpdb;

		$bStatus = $wpdb->delete($this->_sQueueTableName, array('id' => $iFeedQueueId));

		return $bStatus;

	}

}