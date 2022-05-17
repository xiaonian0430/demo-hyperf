<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use Hyperf\Snowflake\Concern\Snowflake;
/**
 * @property $id
 * @property $name
 * @property $gender
 * @property $created_timestamp
 * @property $updated_timestamp
 */
/*
-- 创建数据库
CREATE TABLE `hf_user`(
  `id` CHAR(32) NOT NULL COMMENT '唯一主键',
  `name` CHAR(40) NOT NULL DEFAULT '' COMMENT '姓名',
  `gender` TINYINT NOT NULL DEFAULT 1 COMMENT '性别：1=男 2=女 0=其他',
  `created_timestamp` BIGINT NOT NULL COMMENT '创建的日期时间',
  `updated_timestamp` BIGINT NOT NULL COMMENT '更新的日期时间',
  PRIMARY KEY(`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='测试用户表';
*/
class User extends Model
{
    use Snowflake;
    protected $connection = 'default';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $timestamps = false;
    protected $incrementing = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'name', 
        'gender', 
        'created_timestamp', 
        'updated_timestamp'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string', 
        'gender' => 'integer', 
        'created_timestamp' => 'integer', 
        'updated_timestamp' => 'integer'
    ];
}