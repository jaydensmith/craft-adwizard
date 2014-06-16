<?php
namespace Craft;

class AdWizard_AdRecord extends BaseRecord
{
    
    public function getTableName()
    {
        return 'adwizard_ads';
    }

    protected function defineAttributes()
    {
        $now = new DateTime;
        return array(
            'url'         => array(AttributeType::Url,      'default' => ''),
            'details'     => array(AttributeType::String,   'default' => '', 'column' => ColumnType::Text),
            'startDate'   => array(AttributeType::DateTime, 'default' => $now),
            'endDate'     => array(AttributeType::DateTime, 'default' => $now),
            'maxViews'    => array(AttributeType::Number,   'default' => 0),
            'totalViews'  => array(AttributeType::Number,   'default' => 0),
            'totalClicks' => array(AttributeType::Number,   'default' => 0),
        );
    }

    public function defineRelations()
    {
        return array(
            'element'  => array(static::BELONGS_TO, 'ElementRecord', 'id', 'required' => true, 'onDelete' => static::CASCADE),
            'position' => array(static::BELONGS_TO, 'AdWizard_PositionRecord', 'required' => true, 'onDelete' => static::CASCADE),
            'asset'    => array(static::BELONGS_TO, 'AssetFileRecord'),
        );
    }

}