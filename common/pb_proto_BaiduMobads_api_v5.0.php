<?php
/**
 * Auto generated from BaiduMobads_api_v5.0.proto at 2015-12-03 14:58:49
 *
 * mobads.apiv5 package
 */

/**
 * Version message
 */
class Mobads_Apiv5_Version extends \ProtobufMessage
{
    /* Field index constants */
    const MAJOR = 1;
    const MINOR = 2;
    const MICRO = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::MAJOR => array(
            'default' => 0, 
            'name' => 'major',
            'required' => false,
            'type' => 5,
        ),
        self::MINOR => array(
            'default' => 0, 
            'name' => 'minor',
            'required' => false,
            'type' => 5,
        ),
        self::MICRO => array(
            'default' => 0, 
            'name' => 'micro',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::MAJOR] = 0;
        $this->values[self::MINOR] = 0;
        $this->values[self::MICRO] = 0;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'major' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMajor($value)
    {
        return $this->set(self::MAJOR, $value);
    }

    /**
     * Returns value of 'major' property
     *
     * @return int
     */
    public function getMajor()
    {
        return $this->get(self::MAJOR);
    }

    /**
     * Sets value of 'minor' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMinor($value)
    {
        return $this->set(self::MINOR, $value);
    }

    /**
     * Returns value of 'minor' property
     *
     * @return int
     */
    public function getMinor()
    {
        return $this->get(self::MINOR);
    }

    /**
     * Sets value of 'micro' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMicro($value)
    {
        return $this->set(self::MICRO, $value);
    }

    /**
     * Returns value of 'micro' property
     *
     * @return int
     */
    public function getMicro()
    {
        return $this->get(self::MICRO);
    }
}

/**
 * App message
 */
class Mobads_Apiv5_App extends \ProtobufMessage
{
    /* Field index constants */
    const APP_ID = 1;
    const CHANNEL_ID = 2;
    const APP_VERSION = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::APP_ID => array(
            'default' => '\"\"', 
            'name' => 'app_id',
            'required' => false,
            'type' => 7,
        ),
        self::CHANNEL_ID => array(
            'name' => 'channel_id',
            'required' => false,
            'type' => 7,
        ),
        self::APP_VERSION => array(
            'name' => 'app_version',
            'required' => false,
            'type' => 'Mobads_Apiv5_Version'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::APP_ID] = "";
        $this->values[self::CHANNEL_ID] = null;
        $this->values[self::APP_VERSION] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'app_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAppId($value)
    {
        return $this->set(self::APP_ID, $value);
    }

    /**
     * Returns value of 'app_id' property
     *
     * @return string
     */
    public function getAppId()
    {
        return $this->get(self::APP_ID);
    }

    /**
     * Sets value of 'channel_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setChannelId($value)
    {
        return $this->set(self::CHANNEL_ID, $value);
    }

    /**
     * Returns value of 'channel_id' property
     *
     * @return string
     */
    public function getChannelId()
    {
        return $this->get(self::CHANNEL_ID);
    }

    /**
     * Sets value of 'app_version' property
     *
     * @param Mobads_Apiv5_Version $value Property value
     *
     * @return null
     */
    public function setAppVersion(Mobads_Apiv5_Version $value)
    {
        return $this->set(self::APP_VERSION, $value);
    }

    /**
     * Returns value of 'app_version' property
     *
     * @return Mobads_Apiv5_Version
     */
    public function getAppVersion()
    {
        return $this->get(self::APP_VERSION);
    }
}

/**
 * UdId message
 */
class Mobads_Apiv5_UdId extends \ProtobufMessage
{
    /* Field index constants */
    const IDFA = 1;
    const IMEI = 2;
    const MAC = 3;
    const IMEI_MD5 = 4;
    const ANDROID_ID = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IDFA => array(
            'default' => '\"\"', 
            'name' => 'idfa',
            'required' => false,
            'type' => 7,
        ),
        self::IMEI => array(
            'default' => '\"\"', 
            'name' => 'imei',
            'required' => false,
            'type' => 7,
        ),
        self::MAC => array(
            'default' => '\"\"', 
            'name' => 'mac',
            'required' => false,
            'type' => 7,
        ),
        self::IMEI_MD5 => array(
            'default' => '\"\"', 
            'name' => 'imei_md5',
            'required' => false,
            'type' => 7,
        ),
        self::ANDROID_ID => array(
            'default' => '\"\"', 
            'name' => 'android_id',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IDFA] = "";
        $this->values[self::IMEI] = "";
        $this->values[self::MAC] = "";
        $this->values[self::IMEI_MD5] = "";
        $this->values[self::ANDROID_ID] = "";
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'idfa' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIdfa($value)
    {
        return $this->set(self::IDFA, $value);
    }

    /**
     * Returns value of 'idfa' property
     *
     * @return string
     */
    public function getIdfa()
    {
        return $this->get(self::IDFA);
    }

    /**
     * Sets value of 'imei' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setImei($value)
    {
        return $this->set(self::IMEI, $value);
    }

    /**
     * Returns value of 'imei' property
     *
     * @return string
     */
    public function getImei()
    {
        return $this->get(self::IMEI);
    }

    /**
     * Sets value of 'mac' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMac($value)
    {
        return $this->set(self::MAC, $value);
    }

    /**
     * Returns value of 'mac' property
     *
     * @return string
     */
    public function getMac()
    {
        return $this->get(self::MAC);
    }

    /**
     * Sets value of 'imei_md5' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setImeiMd5($value)
    {
        return $this->set(self::IMEI_MD5, $value);
    }

    /**
     * Returns value of 'imei_md5' property
     *
     * @return string
     */
    public function getImeiMd5()
    {
        return $this->get(self::IMEI_MD5);
    }

    /**
     * Sets value of 'android_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAndroidId($value)
    {
        return $this->set(self::ANDROID_ID, $value);
    }

    /**
     * Returns value of 'android_id' property
     *
     * @return string
     */
    public function getAndroidId()
    {
        return $this->get(self::ANDROID_ID);
    }
}

/**
 * Size message
 */
class Mobads_Apiv5_Size extends \ProtobufMessage
{
    /* Field index constants */
    const WIDTH = 1;
    const HEIGHT = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::WIDTH => array(
            'default' => 0, 
            'name' => 'width',
            'required' => false,
            'type' => 5,
        ),
        self::HEIGHT => array(
            'default' => 0, 
            'name' => 'height',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::WIDTH] = 0;
        $this->values[self::HEIGHT] = 0;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'width' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWidth($value)
    {
        return $this->set(self::WIDTH, $value);
    }

    /**
     * Returns value of 'width' property
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->get(self::WIDTH);
    }

    /**
     * Sets value of 'height' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setHeight($value)
    {
        return $this->set(self::HEIGHT, $value);
    }

    /**
     * Returns value of 'height' property
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->get(self::HEIGHT);
    }
}

/**
 * DeviceType enum embedded in Device message
 */
final class Mobads_Apiv5_Device_DeviceType
{
    const PHONE = 1;
    const TABLET = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'PHONE' => self::PHONE,
            'TABLET' => self::TABLET,
        );
    }
}

/**
 * OsType enum embedded in Device message
 */
final class Mobads_Apiv5_Device_OsType
{
    const ANDROID = 1;
    const IOS = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'ANDROID' => self::ANDROID,
            'IOS' => self::IOS,
        );
    }
}

/**
 * Device message
 */
class Mobads_Apiv5_Device extends \ProtobufMessage
{
    /* Field index constants */
    const DEVICE_TYPE = 1;
    const OS_TYPE = 2;
    const OS_VERSION = 3;
    const VENDOR = 4;
    const MODEL = 5;
    const UDID = 6;
    const SCREEN_SIZE = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::DEVICE_TYPE => array(
            'name' => 'device_type',
            'required' => false,
            'type' => 5,
        ),
        self::OS_TYPE => array(
            'name' => 'os_type',
            'required' => false,
            'type' => 5,
        ),
        self::OS_VERSION => array(
            'name' => 'os_version',
            'required' => false,
            'type' => 'Mobads_Apiv5_Version'
        ),
        self::VENDOR => array(
            'default' => '\"\"', 
            'name' => 'vendor',
            'required' => false,
            'type' => 7,
        ),
        self::MODEL => array(
            'default' => '\"\"', 
            'name' => 'model',
            'required' => false,
            'type' => 7,
        ),
        self::UDID => array(
            'name' => 'udid',
            'required' => false,
            'type' => 'Mobads_Apiv5_UdId'
        ),
        self::SCREEN_SIZE => array(
            'name' => 'screen_size',
            'required' => false,
            'type' => 'Mobads_Apiv5_Size'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::DEVICE_TYPE] = null;
        $this->values[self::OS_TYPE] = null;
        $this->values[self::OS_VERSION] = null;
        $this->values[self::VENDOR] = "";
        $this->values[self::MODEL] = "";
        $this->values[self::UDID] = null;
        $this->values[self::SCREEN_SIZE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'device_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setDeviceType($value)
    {
        return $this->set(self::DEVICE_TYPE, $value);
    }

    /**
     * Returns value of 'device_type' property
     *
     * @return int
     */
    public function getDeviceType()
    {
        return $this->get(self::DEVICE_TYPE);
    }

    /**
     * Sets value of 'os_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setOsType($value)
    {
        return $this->set(self::OS_TYPE, $value);
    }

    /**
     * Returns value of 'os_type' property
     *
     * @return int
     */
    public function getOsType()
    {
        return $this->get(self::OS_TYPE);
    }

    /**
     * Sets value of 'os_version' property
     *
     * @param Mobads_Apiv5_Version $value Property value
     *
     * @return null
     */
    public function setOsVersion(Mobads_Apiv5_Version $value)
    {
        return $this->set(self::OS_VERSION, $value);
    }

    /**
     * Returns value of 'os_version' property
     *
     * @return Mobads_Apiv5_Version
     */
    public function getOsVersion()
    {
        return $this->get(self::OS_VERSION);
    }

    /**
     * Sets value of 'vendor' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setVendor($value)
    {
        return $this->set(self::VENDOR, $value);
    }

    /**
     * Returns value of 'vendor' property
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->get(self::VENDOR);
    }

    /**
     * Sets value of 'model' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setModel($value)
    {
        return $this->set(self::MODEL, $value);
    }

    /**
     * Returns value of 'model' property
     *
     * @return string
     */
    public function getModel()
    {
        return $this->get(self::MODEL);
    }

    /**
     * Sets value of 'udid' property
     *
     * @param Mobads_Apiv5_UdId $value Property value
     *
     * @return null
     */
    public function setUdid(Mobads_Apiv5_UdId $value)
    {
        return $this->set(self::UDID, $value);
    }

    /**
     * Returns value of 'udid' property
     *
     * @return Mobads_Apiv5_UdId
     */
    public function getUdid()
    {
        return $this->get(self::UDID);
    }

    /**
     * Sets value of 'screen_size' property
     *
     * @param Mobads_Apiv5_Size $value Property value
     *
     * @return null
     */
    public function setScreenSize(Mobads_Apiv5_Size $value)
    {
        return $this->set(self::SCREEN_SIZE, $value);
    }

    /**
     * Returns value of 'screen_size' property
     *
     * @return Mobads_Apiv5_Size
     */
    public function getScreenSize()
    {
        return $this->get(self::SCREEN_SIZE);
    }
}

/**
 * WiFiAp message
 */
class Mobads_Apiv5_WiFiAp extends \ProtobufMessage
{
    /* Field index constants */
    const AP_MAC = 1;
    const RSSI = 2;
    const AP_NAME = 3;
    const IS_CONNECTED = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::AP_MAC => array(
            'name' => 'ap_mac',
            'required' => false,
            'type' => 7,
        ),
        self::RSSI => array(
            'name' => 'rssi',
            'required' => false,
            'type' => 5,
        ),
        self::AP_NAME => array(
            'name' => 'ap_name',
            'required' => false,
            'type' => 7,
        ),
        self::IS_CONNECTED => array(
            'name' => 'is_connected',
            'required' => false,
            'type' => 8,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::AP_MAC] = null;
        $this->values[self::RSSI] = null;
        $this->values[self::AP_NAME] = null;
        $this->values[self::IS_CONNECTED] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'ap_mac' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setApMac($value)
    {
        return $this->set(self::AP_MAC, $value);
    }

    /**
     * Returns value of 'ap_mac' property
     *
     * @return string
     */
    public function getApMac()
    {
        return $this->get(self::AP_MAC);
    }

    /**
     * Sets value of 'rssi' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setRssi($value)
    {
        return $this->set(self::RSSI, $value);
    }

    /**
     * Returns value of 'rssi' property
     *
     * @return int
     */
    public function getRssi()
    {
        return $this->get(self::RSSI);
    }

    /**
     * Sets value of 'ap_name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setApName($value)
    {
        return $this->set(self::AP_NAME, $value);
    }

    /**
     * Returns value of 'ap_name' property
     *
     * @return string
     */
    public function getApName()
    {
        return $this->get(self::AP_NAME);
    }

    /**
     * Sets value of 'is_connected' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIsConnected($value)
    {
        return $this->set(self::IS_CONNECTED, $value);
    }

    /**
     * Returns value of 'is_connected' property
     *
     * @return bool
     */
    public function getIsConnected()
    {
        return $this->get(self::IS_CONNECTED);
    }
}

/**
 * ConnectionType enum embedded in Network message
 */
final class Mobads_Apiv5_Network_ConnectionType
{
    const CONNCTION_UNKNOWN = 0;
    const CELL_UNKNOWN = 1;
    const CELL_2G = 2;
    const CELL_3G = 3;
    const CELL_4G = 4;
    const CELL_5G = 5;
    const WIFI = 100;
    const ETHERNET = 101;
    const NEW_TYPE = 999;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'CONNCTION_UNKNOWN' => self::CONNCTION_UNKNOWN,
            'CELL_UNKNOWN' => self::CELL_UNKNOWN,
            'CELL_2G' => self::CELL_2G,
            'CELL_3G' => self::CELL_3G,
            'CELL_4G' => self::CELL_4G,
            'CELL_5G' => self::CELL_5G,
            'WIFI' => self::WIFI,
            'ETHERNET' => self::ETHERNET,
            'NEW_TYPE' => self::NEW_TYPE,
        );
    }
}

/**
 * OperatorType enum embedded in Network message
 */
final class Mobads_Apiv5_Network_OperatorType
{
    const UNKNOWN_OPERATOR = 0;
    const CHINA_MOBILE = 1;
    const CHINA_TELECOM = 2;
    const CHINA_UNICOM = 3;
    const OTHER_OPERATOR = 99;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'UNKNOWN_OPERATOR' => self::UNKNOWN_OPERATOR,
            'CHINA_MOBILE' => self::CHINA_MOBILE,
            'CHINA_TELECOM' => self::CHINA_TELECOM,
            'CHINA_UNICOM' => self::CHINA_UNICOM,
            'OTHER_OPERATOR' => self::OTHER_OPERATOR,
        );
    }
}

/**
 * Network message
 */
class Mobads_Apiv5_Network extends \ProtobufMessage
{
    /* Field index constants */
    const IPV4 = 1;
    const CONNECTION_TYPE = 2;
    const OPERATOR_TYPE = 3;
    const CELLULAR_ID = 4;
    const WIFI_APS = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::IPV4 => array(
            'name' => 'ipv4',
            'required' => false,
            'type' => 7,
        ),
        self::CONNECTION_TYPE => array(
            'name' => 'connection_type',
            'required' => false,
            'type' => 5,
        ),
        self::OPERATOR_TYPE => array(
            'name' => 'operator_type',
            'required' => false,
            'type' => 5,
        ),
        self::CELLULAR_ID => array(
            'name' => 'cellular_id',
            'required' => false,
            'type' => 7,
        ),
        self::WIFI_APS => array(
            'name' => 'wifi_aps',
            'repeated' => true,
            'type' => 'Mobads_Apiv5_WiFiAp'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::IPV4] = null;
        $this->values[self::CONNECTION_TYPE] = null;
        $this->values[self::OPERATOR_TYPE] = null;
        $this->values[self::CELLULAR_ID] = null;
        $this->values[self::WIFI_APS] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'ipv4' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setIpv4($value)
    {
        return $this->set(self::IPV4, $value);
    }

    /**
     * Returns value of 'ipv4' property
     *
     * @return string
     */
    public function getIpv4()
    {
        return $this->get(self::IPV4);
    }

    /**
     * Sets value of 'connection_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setConnectionType($value)
    {
        return $this->set(self::CONNECTION_TYPE, $value);
    }

    /**
     * Returns value of 'connection_type' property
     *
     * @return int
     */
    public function getConnectionType()
    {
        return $this->get(self::CONNECTION_TYPE);
    }

    /**
     * Sets value of 'operator_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setOperatorType($value)
    {
        return $this->set(self::OPERATOR_TYPE, $value);
    }

    /**
     * Returns value of 'operator_type' property
     *
     * @return int
     */
    public function getOperatorType()
    {
        return $this->get(self::OPERATOR_TYPE);
    }

    /**
     * Sets value of 'cellular_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setCellularId($value)
    {
        return $this->set(self::CELLULAR_ID, $value);
    }

    /**
     * Returns value of 'cellular_id' property
     *
     * @return string
     */
    public function getCellularId()
    {
        return $this->get(self::CELLULAR_ID);
    }

    /**
     * Appends value to 'wifi_aps' list
     *
     * @param Mobads_Apiv5_WiFiAp $value Value to append
     *
     * @return null
     */
    public function appendWifiAps(Mobads_Apiv5_WiFiAp $value)
    {
        return $this->append(self::WIFI_APS, $value);
    }

    /**
     * Clears 'wifi_aps' list
     *
     * @return null
     */
    public function clearWifiAps()
    {
        return $this->clear(self::WIFI_APS);
    }

    /**
     * Returns 'wifi_aps' list
     *
     * @return Mobads_Apiv5_WiFiAp[]
     */
    public function getWifiAps()
    {
        return $this->get(self::WIFI_APS);
    }

    /**
     * Returns 'wifi_aps' iterator
     *
     * @return ArrayIterator
     */
    public function getWifiApsIterator()
    {
        return new \ArrayIterator($this->get(self::WIFI_APS));
    }

    /**
     * Returns element from 'wifi_aps' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return Mobads_Apiv5_WiFiAp
     */
    public function getWifiApsAt($offset)
    {
        return $this->get(self::WIFI_APS, $offset);
    }

    /**
     * Returns count of 'wifi_aps' list
     *
     * @return int
     */
    public function getWifiApsCount()
    {
        return $this->count(self::WIFI_APS);
    }
}

/**
 * CoordinateType enum embedded in Gps message
 */
final class Mobads_Apiv5_Gps_CoordinateType
{
    const WGS84 = 1;
    const GCJ02 = 2;
    const BD09 = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'WGS84' => self::WGS84,
            'GCJ02' => self::GCJ02,
            'BD09' => self::BD09,
        );
    }
}

/**
 * Gps message
 */
class Mobads_Apiv5_Gps extends \ProtobufMessage
{
    /* Field index constants */
    const COORDINATE_TYPE = 1;
    const LONGITUDE = 2;
    const LATITUDE = 3;
    const TIMESTAMP = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::COORDINATE_TYPE => array(
            'name' => 'coordinate_type',
            'required' => false,
            'type' => 5,
        ),
        self::LONGITUDE => array(
            'name' => 'longitude',
            'required' => false,
            'type' => 1,
        ),
        self::LATITUDE => array(
            'name' => 'latitude',
            'required' => false,
            'type' => 1,
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::COORDINATE_TYPE] = null;
        $this->values[self::LONGITUDE] = null;
        $this->values[self::LATITUDE] = null;
        $this->values[self::TIMESTAMP] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'coordinate_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCoordinateType($value)
    {
        return $this->set(self::COORDINATE_TYPE, $value);
    }

    /**
     * Returns value of 'coordinate_type' property
     *
     * @return int
     */
    public function getCoordinateType()
    {
        return $this->get(self::COORDINATE_TYPE);
    }

    /**
     * Sets value of 'longitude' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setLongitude($value)
    {
        return $this->set(self::LONGITUDE, $value);
    }

    /**
     * Returns value of 'longitude' property
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->get(self::LONGITUDE);
    }

    /**
     * Sets value of 'latitude' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setLatitude($value)
    {
        return $this->set(self::LATITUDE, $value);
    }

    /**
     * Returns value of 'latitude' property
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->get(self::LATITUDE);
    }

    /**
     * Sets value of 'timestamp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimestamp($value)
    {
        return $this->set(self::TIMESTAMP, $value);
    }

    /**
     * Returns value of 'timestamp' property
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->get(self::TIMESTAMP);
    }
}

/**
 * AdSlot message
 */
class Mobads_Apiv5_AdSlot extends \ProtobufMessage
{
    /* Field index constants */
    const ADSLOT_ID = 1;
    const ADSLOT_SIZE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ADSLOT_ID => array(
            'name' => 'adslot_id',
            'required' => false,
            'type' => 7,
        ),
        self::ADSLOT_SIZE => array(
            'name' => 'adslot_size',
            'required' => false,
            'type' => 'Mobads_Apiv5_Size'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::ADSLOT_ID] = null;
        $this->values[self::ADSLOT_SIZE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'adslot_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAdslotId($value)
    {
        return $this->set(self::ADSLOT_ID, $value);
    }

    /**
     * Returns value of 'adslot_id' property
     *
     * @return string
     */
    public function getAdslotId()
    {
        return $this->get(self::ADSLOT_ID);
    }

    /**
     * Sets value of 'adslot_size' property
     *
     * @param Mobads_Apiv5_Size $value Property value
     *
     * @return null
     */
    public function setAdslotSize(Mobads_Apiv5_Size $value)
    {
        return $this->set(self::ADSLOT_SIZE, $value);
    }

    /**
     * Returns value of 'adslot_size' property
     *
     * @return Mobads_Apiv5_Size
     */
    public function getAdslotSize()
    {
        return $this->get(self::ADSLOT_SIZE);
    }
}

/**
 * MobadsRequest message
 */
class Mobads_Apiv5_MobadsRequest extends \ProtobufMessage
{
    /* Field index constants */
    const REQUEST_ID = 1;
    const API_VERSION = 2;
    const APP = 3;
    const DEVICE = 4;
    const NETWORK = 5;
    const GPS = 6;
    const ADSLOT = 7;
    const IS_DEBUG = 8;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REQUEST_ID => array(
            'name' => 'request_id',
            'required' => false,
            'type' => 7,
        ),
        self::API_VERSION => array(
            'name' => 'api_version',
            'required' => false,
            'type' => 'Mobads_Apiv5_Version'
        ),
        self::APP => array(
            'name' => 'app',
            'required' => false,
            'type' => 'Mobads_Apiv5_App'
        ),
        self::DEVICE => array(
            'name' => 'device',
            'required' => false,
            'type' => 'Mobads_Apiv5_Device'
        ),
        self::NETWORK => array(
            'name' => 'network',
            'required' => false,
            'type' => 'Mobads_Apiv5_Network'
        ),
        self::GPS => array(
            'name' => 'gps',
            'required' => false,
            'type' => 'Mobads_Apiv5_Gps'
        ),
        self::ADSLOT => array(
            'name' => 'adslot',
            'required' => false,
            'type' => 'Mobads_Apiv5_AdSlot'
        ),
        self::IS_DEBUG => array(
            'default' => false, 
            'name' => 'is_debug',
            'required' => false,
            'type' => 8,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::REQUEST_ID] = null;
        $this->values[self::API_VERSION] = null;
        $this->values[self::APP] = null;
        $this->values[self::DEVICE] = null;
        $this->values[self::NETWORK] = null;
        $this->values[self::GPS] = null;
        $this->values[self::ADSLOT] = null;
        $this->values[self::IS_DEBUG] = false;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'request_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRequestId($value)
    {
        return $this->set(self::REQUEST_ID, $value);
    }

    /**
     * Returns value of 'request_id' property
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->get(self::REQUEST_ID);
    }

    /**
     * Sets value of 'api_version' property
     *
     * @param Mobads_Apiv5_Version $value Property value
     *
     * @return null
     */
    public function setApiVersion(Mobads_Apiv5_Version $value)
    {
        return $this->set(self::API_VERSION, $value);
    }

    /**
     * Returns value of 'api_version' property
     *
     * @return Mobads_Apiv5_Version
     */
    public function getApiVersion()
    {
        return $this->get(self::API_VERSION);
    }

    /**
     * Sets value of 'app' property
     *
     * @param Mobads_Apiv5_App $value Property value
     *
     * @return null
     */
    public function setApp(Mobads_Apiv5_App $value)
    {
        return $this->set(self::APP, $value);
    }

    /**
     * Returns value of 'app' property
     *
     * @return Mobads_Apiv5_App
     */
    public function getApp()
    {
        return $this->get(self::APP);
    }

    /**
     * Sets value of 'device' property
     *
     * @param Mobads_Apiv5_Device $value Property value
     *
     * @return null
     */
    public function setDevice(Mobads_Apiv5_Device $value)
    {
        return $this->set(self::DEVICE, $value);
    }

    /**
     * Returns value of 'device' property
     *
     * @return Mobads_Apiv5_Device
     */
    public function getDevice()
    {
        return $this->get(self::DEVICE);
    }

    /**
     * Sets value of 'network' property
     *
     * @param Mobads_Apiv5_Network $value Property value
     *
     * @return null
     */
    public function setNetwork(Mobads_Apiv5_Network $value)
    {
        return $this->set(self::NETWORK, $value);
    }

    /**
     * Returns value of 'network' property
     *
     * @return Mobads_Apiv5_Network
     */
    public function getNetwork()
    {
        return $this->get(self::NETWORK);
    }

    /**
     * Sets value of 'gps' property
     *
     * @param Mobads_Apiv5_Gps $value Property value
     *
     * @return null
     */
    public function setGps(Mobads_Apiv5_Gps $value)
    {
        return $this->set(self::GPS, $value);
    }

    /**
     * Returns value of 'gps' property
     *
     * @return Mobads_Apiv5_Gps
     */
    public function getGps()
    {
        return $this->get(self::GPS);
    }

    /**
     * Sets value of 'adslot' property
     *
     * @param Mobads_Apiv5_AdSlot $value Property value
     *
     * @return null
     */
    public function setAdslot(Mobads_Apiv5_AdSlot $value)
    {
        return $this->set(self::ADSLOT, $value);
    }

    /**
     * Returns value of 'adslot' property
     *
     * @return Mobads_Apiv5_AdSlot
     */
    public function getAdslot()
    {
        return $this->get(self::ADSLOT);
    }

    /**
     * Sets value of 'is_debug' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIsDebug($value)
    {
        return $this->set(self::IS_DEBUG, $value);
    }

    /**
     * Returns value of 'is_debug' property
     *
     * @return bool
     */
    public function getIsDebug()
    {
        return $this->get(self::IS_DEBUG);
    }
}

/**
 * CreativeType enum embedded in MaterialMeta message
 */
final class Mobads_Apiv5_MaterialMeta_CreativeType
{
    const NO_TYPE = 0;
    const TEXT = 1;
    const IMAGE = 2;
    const TEXT_ICON = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'NO_TYPE' => self::NO_TYPE,
            'TEXT' => self::TEXT,
            'IMAGE' => self::IMAGE,
            'TEXT_ICON' => self::TEXT_ICON,
        );
    }
}

/**
 * InteractionType enum embedded in MaterialMeta message
 */
final class Mobads_Apiv5_MaterialMeta_InteractionType
{
    const NO_INTERACTION = 0;
    const SURFING = 1;
    const DOWNLOAD = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'NO_INTERACTION' => self::NO_INTERACTION,
            'SURFING' => self::SURFING,
            'DOWNLOAD' => self::DOWNLOAD,
        );
    }
}

/**
 * MaterialMeta message
 */
class Mobads_Apiv5_MaterialMeta extends \ProtobufMessage
{
    /* Field index constants */
    const CREATIVE_TYPE = 1;
    const INTERACTION_TYPE = 2;
    const WIN_NOTICE_URL = 3;
    const CLICK_URL = 4;
    const TITLE = 5;
    const DESCRIPTION = 6;
    const ICON_SRC = 7;
    const IMAGE_SRC = 8;
    const APP_PACKAGE = 9;
    const APP_SIZE = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CREATIVE_TYPE => array(
            'name' => 'creative_type',
            'required' => false,
            'type' => 5,
        ),
        self::INTERACTION_TYPE => array(
            'name' => 'interaction_type',
            'required' => false,
            'type' => 5,
        ),
        self::WIN_NOTICE_URL => array(
            'name' => 'win_notice_url',
            'repeated' => true,
            'type' => 7,
        ),
        self::CLICK_URL => array(
            'name' => 'click_url',
            'required' => false,
            'type' => 7,
        ),
        self::TITLE => array(
            'name' => 'title',
            'required' => false,
            'type' => 7,
        ),
        self::DESCRIPTION => array(
            'name' => 'description',
            'repeated' => true,
            'type' => 7,
        ),
        self::ICON_SRC => array(
            'name' => 'icon_src',
            'repeated' => true,
            'type' => 7,
        ),
        self::IMAGE_SRC => array(
            'name' => 'image_src',
            'repeated' => true,
            'type' => 7,
        ),
        self::APP_PACKAGE => array(
            'name' => 'app_package',
            'required' => false,
            'type' => 7,
        ),
        self::APP_SIZE => array(
            'name' => 'app_size',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::CREATIVE_TYPE] = null;
        $this->values[self::INTERACTION_TYPE] = null;
        $this->values[self::WIN_NOTICE_URL] = array();
        $this->values[self::CLICK_URL] = null;
        $this->values[self::TITLE] = null;
        $this->values[self::DESCRIPTION] = array();
        $this->values[self::ICON_SRC] = array();
        $this->values[self::IMAGE_SRC] = array();
        $this->values[self::APP_PACKAGE] = null;
        $this->values[self::APP_SIZE] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'creative_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCreativeType($value)
    {
        return $this->set(self::CREATIVE_TYPE, $value);
    }

    /**
     * Returns value of 'creative_type' property
     *
     * @return int
     */
    public function getCreativeType()
    {
        return $this->get(self::CREATIVE_TYPE);
    }

    /**
     * Sets value of 'interaction_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setInteractionType($value)
    {
        return $this->set(self::INTERACTION_TYPE, $value);
    }

    /**
     * Returns value of 'interaction_type' property
     *
     * @return int
     */
    public function getInteractionType()
    {
        return $this->get(self::INTERACTION_TYPE);
    }

    /**
     * Appends value to 'win_notice_url' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendWinNoticeUrl($value)
    {
        return $this->append(self::WIN_NOTICE_URL, $value);
    }

    /**
     * Clears 'win_notice_url' list
     *
     * @return null
     */
    public function clearWinNoticeUrl()
    {
        return $this->clear(self::WIN_NOTICE_URL);
    }

    /**
     * Returns 'win_notice_url' list
     *
     * @return string[]
     */
    public function getWinNoticeUrl()
    {
        return $this->get(self::WIN_NOTICE_URL);
    }

    /**
     * Returns 'win_notice_url' iterator
     *
     * @return ArrayIterator
     */
    public function getWinNoticeUrlIterator()
    {
        return new \ArrayIterator($this->get(self::WIN_NOTICE_URL));
    }

    /**
     * Returns element from 'win_notice_url' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getWinNoticeUrlAt($offset)
    {
        return $this->get(self::WIN_NOTICE_URL, $offset);
    }

    /**
     * Returns count of 'win_notice_url' list
     *
     * @return int
     */
    public function getWinNoticeUrlCount()
    {
        return $this->count(self::WIN_NOTICE_URL);
    }

    /**
     * Sets value of 'click_url' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setClickUrl($value)
    {
        return $this->set(self::CLICK_URL, $value);
    }

    /**
     * Returns value of 'click_url' property
     *
     * @return string
     */
    public function getClickUrl()
    {
        return $this->get(self::CLICK_URL);
    }

    /**
     * Sets value of 'title' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTitle($value)
    {
        return $this->set(self::TITLE, $value);
    }

    /**
     * Returns value of 'title' property
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->get(self::TITLE);
    }

    /**
     * Appends value to 'description' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendDescription($value)
    {
        return $this->append(self::DESCRIPTION, $value);
    }

    /**
     * Clears 'description' list
     *
     * @return null
     */
    public function clearDescription()
    {
        return $this->clear(self::DESCRIPTION);
    }

    /**
     * Returns 'description' list
     *
     * @return string[]
     */
    public function getDescription()
    {
        return $this->get(self::DESCRIPTION);
    }

    /**
     * Returns 'description' iterator
     *
     * @return ArrayIterator
     */
    public function getDescriptionIterator()
    {
        return new \ArrayIterator($this->get(self::DESCRIPTION));
    }

    /**
     * Returns element from 'description' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getDescriptionAt($offset)
    {
        return $this->get(self::DESCRIPTION, $offset);
    }

    /**
     * Returns count of 'description' list
     *
     * @return int
     */
    public function getDescriptionCount()
    {
        return $this->count(self::DESCRIPTION);
    }

    /**
     * Appends value to 'icon_src' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendIconSrc($value)
    {
        return $this->append(self::ICON_SRC, $value);
    }

    /**
     * Clears 'icon_src' list
     *
     * @return null
     */
    public function clearIconSrc()
    {
        return $this->clear(self::ICON_SRC);
    }

    /**
     * Returns 'icon_src' list
     *
     * @return string[]
     */
    public function getIconSrc()
    {
        return $this->get(self::ICON_SRC);
    }

    /**
     * Returns 'icon_src' iterator
     *
     * @return ArrayIterator
     */
    public function getIconSrcIterator()
    {
        return new \ArrayIterator($this->get(self::ICON_SRC));
    }

    /**
     * Returns element from 'icon_src' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getIconSrcAt($offset)
    {
        return $this->get(self::ICON_SRC, $offset);
    }

    /**
     * Returns count of 'icon_src' list
     *
     * @return int
     */
    public function getIconSrcCount()
    {
        return $this->count(self::ICON_SRC);
    }

    /**
     * Appends value to 'image_src' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendImageSrc($value)
    {
        return $this->append(self::IMAGE_SRC, $value);
    }

    /**
     * Clears 'image_src' list
     *
     * @return null
     */
    public function clearImageSrc()
    {
        return $this->clear(self::IMAGE_SRC);
    }

    /**
     * Returns 'image_src' list
     *
     * @return string[]
     */
    public function getImageSrc()
    {
        return $this->get(self::IMAGE_SRC);
    }

    /**
     * Returns 'image_src' iterator
     *
     * @return ArrayIterator
     */
    public function getImageSrcIterator()
    {
        return new \ArrayIterator($this->get(self::IMAGE_SRC));
    }

    /**
     * Returns element from 'image_src' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getImageSrcAt($offset)
    {
        return $this->get(self::IMAGE_SRC, $offset);
    }

    /**
     * Returns count of 'image_src' list
     *
     * @return int
     */
    public function getImageSrcCount()
    {
        return $this->count(self::IMAGE_SRC);
    }

    /**
     * Sets value of 'app_package' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAppPackage($value)
    {
        return $this->set(self::APP_PACKAGE, $value);
    }

    /**
     * Returns value of 'app_package' property
     *
     * @return string
     */
    public function getAppPackage()
    {
        return $this->get(self::APP_PACKAGE);
    }

    /**
     * Sets value of 'app_size' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAppSize($value)
    {
        return $this->set(self::APP_SIZE, $value);
    }

    /**
     * Returns value of 'app_size' property
     *
     * @return int
     */
    public function getAppSize()
    {
        return $this->get(self::APP_SIZE);
    }
}

/**
 * Ad message
 */
class Mobads_Apiv5_Ad extends \ProtobufMessage
{
    /* Field index constants */
    const ADSLOT_ID = 1;
    const HTML_SNIPPET = 2;
    const MATERIAL_META = 3;
    const AD_KEY = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ADSLOT_ID => array(
            'name' => 'adslot_id',
            'required' => false,
            'type' => 7,
        ),
        self::HTML_SNIPPET => array(
            'name' => 'html_snippet',
            'required' => false,
            'type' => 7,
        ),
        self::MATERIAL_META => array(
            'name' => 'material_meta',
            'required' => false,
            'type' => 'Mobads_Apiv5_MaterialMeta'
        ),
        self::AD_KEY => array(
            'name' => 'ad_key',
            'required' => false,
            'type' => 7,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::ADSLOT_ID] = null;
        $this->values[self::HTML_SNIPPET] = null;
        $this->values[self::MATERIAL_META] = null;
        $this->values[self::AD_KEY] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'adslot_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAdslotId($value)
    {
        return $this->set(self::ADSLOT_ID, $value);
    }

    /**
     * Returns value of 'adslot_id' property
     *
     * @return string
     */
    public function getAdslotId()
    {
        return $this->get(self::ADSLOT_ID);
    }

    /**
     * Sets value of 'html_snippet' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setHtmlSnippet($value)
    {
        return $this->set(self::HTML_SNIPPET, $value);
    }

    /**
     * Returns value of 'html_snippet' property
     *
     * @return string
     */
    public function getHtmlSnippet()
    {
        return $this->get(self::HTML_SNIPPET);
    }

    /**
     * Sets value of 'material_meta' property
     *
     * @param Mobads_Apiv5_MaterialMeta $value Property value
     *
     * @return null
     */
    public function setMaterialMeta(Mobads_Apiv5_MaterialMeta $value)
    {
        return $this->set(self::MATERIAL_META, $value);
    }

    /**
     * Returns value of 'material_meta' property
     *
     * @return Mobads_Apiv5_MaterialMeta
     */
    public function getMaterialMeta()
    {
        return $this->get(self::MATERIAL_META);
    }

    /**
     * Sets value of 'ad_key' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAdKey($value)
    {
        return $this->set(self::AD_KEY, $value);
    }

    /**
     * Returns value of 'ad_key' property
     *
     * @return string
     */
    public function getAdKey()
    {
        return $this->get(self::AD_KEY);
    }
}

/**
 * MobadsResponse message
 */
class Mobads_Apiv5_MobadsResponse extends \ProtobufMessage
{
    /* Field index constants */
    const REQUEST_ID = 1;
    const ERROR_CODE = 2;
    const ADS = 3;
    const EXPIRATION_TIME = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REQUEST_ID => array(
            'name' => 'request_id',
            'required' => false,
            'type' => 7,
        ),
        self::ERROR_CODE => array(
            'name' => 'error_code',
            'required' => false,
            'type' => 5,
        ),
        self::ADS => array(
            'name' => 'ads',
            'repeated' => true,
            'type' => 'Mobads_Apiv5_Ad'
        ),
        self::EXPIRATION_TIME => array(
            'name' => 'expiration_time',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::REQUEST_ID] = null;
        $this->values[self::ERROR_CODE] = null;
        $this->values[self::ADS] = array();
        $this->values[self::EXPIRATION_TIME] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'request_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRequestId($value)
    {
        return $this->set(self::REQUEST_ID, $value);
    }

    /**
     * Returns value of 'request_id' property
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->get(self::REQUEST_ID);
    }

    /**
     * Sets value of 'error_code' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setErrorCode($value)
    {
        return $this->set(self::ERROR_CODE, $value);
    }

    /**
     * Returns value of 'error_code' property
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->get(self::ERROR_CODE);
    }

    /**
     * Appends value to 'ads' list
     *
     * @param Mobads_Apiv5_Ad $value Value to append
     *
     * @return null
     */
    public function appendAds(Mobads_Apiv5_Ad $value)
    {
        return $this->append(self::ADS, $value);
    }

    /**
     * Clears 'ads' list
     *
     * @return null
     */
    public function clearAds()
    {
        return $this->clear(self::ADS);
    }

    /**
     * Returns 'ads' list
     *
     * @return Mobads_Apiv5_Ad[]
     */
    public function getAds()
    {
        return $this->get(self::ADS);
    }

    /**
     * Returns 'ads' iterator
     *
     * @return ArrayIterator
     */
    public function getAdsIterator()
    {
        return new \ArrayIterator($this->get(self::ADS));
    }

    /**
     * Returns element from 'ads' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return Mobads_Apiv5_Ad
     */
    public function getAdsAt($offset)
    {
        return $this->get(self::ADS, $offset);
    }

    /**
     * Returns count of 'ads' list
     *
     * @return int
     */
    public function getAdsCount()
    {
        return $this->count(self::ADS);
    }

    /**
     * Sets value of 'expiration_time' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setExpirationTime($value)
    {
        return $this->set(self::EXPIRATION_TIME, $value);
    }

    /**
     * Returns value of 'expiration_time' property
     *
     * @return int
     */
    public function getExpirationTime()
    {
        return $this->get(self::EXPIRATION_TIME);
    }
}
