<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection alias
     * @property Grid\Column|Collection authors
     * @property Grid\Column|Collection enable
     * @property Grid\Column|Collection imported
     * @property Grid\Column|Collection config
     * @property Grid\Column|Collection require
     * @property Grid\Column|Collection require_dev
     * @property Grid\Column|Collection width
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection img_url
     * @property Grid\Column|Collection position
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection uid
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection input
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection is_del
     * @property Grid\Column|Collection pidcard
     * @property Grid\Column|Collection pname
     * @property Grid\Column|Collection pphone
     * @property Grid\Column|Collection company_code
     * @property Grid\Column|Collection contact_name
     * @property Grid\Column|Collection contact_tel
     * @property Grid\Column|Collection date
     * @property Grid\Column|Collection flight_no
     * @property Grid\Column|Collection from
     * @property Grid\Column|Collection item_id
     * @property Grid\Column|Collection order_no
     * @property Grid\Column|Collection passagers
     * @property Grid\Column|Collection pay_channel
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection seat_code
     * @property Grid\Column|Collection to
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection assets_name
     * @property Grid\Column|Collection assets_type_id
     * @property Grid\Column|Collection change_times
     * @property Grid\Column|Collection freeze_amount
     * @property Grid\Column|Collection amount_before_change
     * @property Grid\Column|Collection operate_type
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection tx_hash
     * @property Grid\Column|Collection user_agent
     * @property Grid\Column|Collection can_withdraw
     * @property Grid\Column|Collection contract_address
     * @property Grid\Column|Collection large_withdraw_amount
     * @property Grid\Column|Collection recharge_status
     * @property Grid\Column|Collection withdraw_fee
     * @property Grid\Column|Collection id_card
     * @property Grid\Column|Collection id_card_img
     * @property Grid\Column|Collection id_card_people_img
     * @property Grid\Column|Collection msg
     * @property Grid\Column|Collection reason
     * @property Grid\Column|Collection img
     * @property Grid\Column|Collection img2
     * @property Grid\Column|Collection img_details1
     * @property Grid\Column|Collection img_details2
     * @property Grid\Column|Collection img_details3
     * @property Grid\Column|Collection phone
     * @property Grid\Column|Collection work
     * @property Grid\Column|Collection sort
     * @property Grid\Column|Collection banners
     * @property Grid\Column|Collection business_apply_id
     * @property Grid\Column|Collection category_id
     * @property Grid\Column|Collection city
     * @property Grid\Column|Collection contact_number
     * @property Grid\Column|Collection district
     * @property Grid\Column|Collection is_recommend
     * @property Grid\Column|Collection is_status
     * @property Grid\Column|Collection lg
     * @property Grid\Column|Collection limit_price
     * @property Grid\Column|Collection lt
     * @property Grid\Column|Collection main_business
     * @property Grid\Column|Collection province
     * @property Grid\Column|Collection run_time
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection code
     * @property Grid\Column|Collection p_code
     * @property Grid\Column|Collection new_user_number
     * @property Grid\Column|Collection total_consumption
     * @property Grid\Column|Collection user_active
     * @property Grid\Column|Collection user_number
     * @property Grid\Column|Collection yesterday_consumption
     * @property Grid\Column|Collection oid
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection usdt_amount
     * @property Grid\Column|Collection user_name
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection activityState
     * @property Grid\Column|Collection consumer_uid
     * @property Grid\Column|Collection role
     * @property Grid\Column|Collection business_uid
     * @property Grid\Column|Collection is_confirm
     * @property Grid\Column|Collection profit_price
     * @property Grid\Column|Collection profit_ratio
     * @property Grid\Column|Collection shop_order_id
     * @property Grid\Column|Collection order_id
     * @property Grid\Column|Collection submenu
     * @property Grid\Column|Collection cat_id
     * @property Grid\Column|Collection data
     * @property Grid\Column|Collection error
     * @property Grid\Column|Collection log
     * @property Grid\Column|Collection import_day
     * @property Grid\Column|Collection line_up
     * @property Grid\Column|Collection member_gl_oid
     * @property Grid\Column|Collection pay_status
     * @property Grid\Column|Collection to_be_added_integral
     * @property Grid\Column|Collection to_status
     * @property Grid\Column|Collection order_nos
     * @property Grid\Column|Collection return_type
     * @property Grid\Column|Collection trade_no
     * @property Grid\Column|Collection aid
     * @property Grid\Column|Collection bill_state
     * @property Grid\Column|Collection bill_time
     * @property Grid\Column|Collection ctime
     * @property Grid\Column|Collection etime
     * @property Grid\Column|Collection idcard_no
     * @property Grid\Column|Collection idcard_type
     * @property Grid\Column|Collection legs
     * @property Grid\Column|Collection order_state
     * @property Grid\Column|Collection order_type
     * @property Grid\Column|Collection other_fee
     * @property Grid\Column|Collection passenger_name
     * @property Grid\Column|Collection passenger_tel
     * @property Grid\Column|Collection pay_cash
     * @property Grid\Column|Collection recevie_station
     * @property Grid\Column|Collection refund_fee
     * @property Grid\Column|Collection seat_type
     * @property Grid\Column|Collection start_station
     * @property Grid\Column|Collection start_time
     * @property Grid\Column|Collection ticket_no
     * @property Grid\Column|Collection total_face_price
     * @property Grid\Column|Collection total_other_fee
     * @property Grid\Column|Collection total_pay_cash
     * @property Grid\Column|Collection total_refund_amount
     * @property Grid\Column|Collection train_no
     * @property Grid\Column|Collection utime
     * @property Grid\Column|Collection child_ages
     * @property Grid\Column|Collection child_num
     * @property Grid\Column|Collection contact_email
     * @property Grid\Column|Collection contact_phone
     * @property Grid\Column|Collection customer_arrive_time
     * @property Grid\Column|Collection customer_name
     * @property Grid\Column|Collection goods_title
     * @property Grid\Column|Collection hotel_id
     * @property Grid\Column|Collection in_date
     * @property Grid\Column|Collection man
     * @property Grid\Column|Collection money
     * @property Grid\Column|Collection out_date
     * @property Grid\Column|Collection special_remarks
     * @property Grid\Column|Collection count_lk
     * @property Grid\Column|Collection count_profit_price
     * @property Grid\Column|Collection day
     * @property Grid\Column|Collection dr_count
     * @property Grid\Column|Collection other_price
     * @property Grid\Column|Collection price_10
     * @property Grid\Column|Collection price_20
     * @property Grid\Column|Collection price_5
     * @property Grid\Column|Collection switch
     * @property Grid\Column|Collection create_type
     * @property Grid\Column|Collection has_child
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection num
     * @property Grid\Column|Collection order_mobile_id
     * @property Grid\Column|Collection account
     * @property Grid\Column|Collection balance
     * @property Grid\Column|Collection bill_cycle
     * @property Grid\Column|Collection content_id
     * @property Grid\Column|Collection contract_no
     * @property Grid\Column|Collection item4
     * @property Grid\Column|Collection pay_amount
     * @property Grid\Column|Collection penalty
     * @property Grid\Column|Collection prepaid_flag
     * @property Grid\Column|Collection card_list
     * @property Grid\Column|Collection channel
     * @property Grid\Column|Collection created_time
     * @property Grid\Column|Collection end_time
     * @property Grid\Column|Collection out_trans_id
     * @property Grid\Column|Collection party_order_id
     * @property Grid\Column|Collection pay_amt
     * @property Grid\Column|Collection pid
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection img_back
     * @property Grid\Column|Collection img_just
     * @property Grid\Column|Collection num_id
     * @property Grid\Column|Collection second
     * @property Grid\Column|Collection business
     * @property Grid\Column|Collection business_lk_iets
     * @property Grid\Column|Collection consumer
     * @property Grid\Column|Collection consumer_lk_iets
     * @property Grid\Column|Collection join_business
     * @property Grid\Column|Collection join_consumer
     * @property Grid\Column|Collection market
     * @property Grid\Column|Collection new_business
     * @property Grid\Column|Collection people
     * @property Grid\Column|Collection platform
     * @property Grid\Column|Collection share
     * @property Grid\Column|Collection welfare
     * @property Grid\Column|Collection reorder_id
     * @property Grid\Column|Collection key
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection is_add_points
     * @property Grid\Column|Collection sign_date
     * @property Grid\Column|Collection total_num
     * @property Grid\Column|Collection yx_uid
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection integral
     * @property Grid\Column|Collection modified_time
     * @property Grid\Column|Collection need_fee
     * @property Grid\Column|Collection numeric
     * @property Grid\Column|Collection order_from
     * @property Grid\Column|Collection pay_time
     * @property Grid\Column|Collection remarks
     * @property Grid\Column|Collection telecom
     * @property Grid\Column|Collection admin_id
     * @property Grid\Column|Collection assets_id
     * @property Grid\Column|Collection assets_type
     * @property Grid\Column|Collection block_hash
     * @property Grid\Column|Collection block_number
     * @property Grid\Column|Collection data_id
     * @property Grid\Column|Collection deal_type
     * @property Grid\Column|Collection gas_price
     * @property Grid\Column|Collection hash
     * @property Grid\Column|Collection payee
     * @property Grid\Column|Collection token_tx_amount
     * @property Grid\Column|Collection tx_status
     * @property Grid\Column|Collection access_token
     * @property Grid\Column|Collection alipay_alipay_user_id
     * @property Grid\Column|Collection alipay_user_id
     * @property Grid\Column|Collection app_id
     * @property Grid\Column|Collection auth_code
     * @property Grid\Column|Collection expires_in
     * @property Grid\Column|Collection is_used
     * @property Grid\Column|Collection re_expires_in
     * @property Grid\Column|Collection refresh_token
     * @property Grid\Column|Collection scope
     * @property Grid\Column|Collection source
     * @property Grid\Column|Collection change_address_time
     * @property Grid\Column|Collection change_password_ip
     * @property Grid\Column|Collection change_password_time
     * @property Grid\Column|Collection last_ip
     * @property Grid\Column|Collection last_login
     * @property Grid\Column|Collection img_hold
     * @property Grid\Column|Collection money_before_change
     * @property Grid\Column|Collection sys_mid
     * @property Grid\Column|Collection edit_to_phone
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection alipay_account
     * @property Grid\Column|Collection alipay_avatar
     * @property Grid\Column|Collection alipay_nickname
     * @property Grid\Column|Collection balance_allowance
     * @property Grid\Column|Collection balance_consume
     * @property Grid\Column|Collection balance_tuan
     * @property Grid\Column|Collection ban_reason
     * @property Grid\Column|Collection birth
     * @property Grid\Column|Collection business_integral
     * @property Grid\Column|Collection business_lk
     * @property Grid\Column|Collection code_invite
     * @property Grid\Column|Collection invite_uid
     * @property Grid\Column|Collection is_auth
     * @property Grid\Column|Collection lk
     * @property Grid\Column|Collection market_business
     * @property Grid\Column|Collection member_head
     * @property Grid\Column|Collection member_status
     * @property Grid\Column|Collection real_name
     * @property Grid\Column|Collection return_business_integral
     * @property Grid\Column|Collection return_integral
     * @property Grid\Column|Collection return_lk
     * @property Grid\Column|Collection salt
     * @property Grid\Column|Collection sex
     * @property Grid\Column|Collection shop_uid
     * @property Grid\Column|Collection sign
     * @property Grid\Column|Collection expires_at
     * @property Grid\Column|Collection used
     * @property Grid\Column|Collection actual_amount
     * @property Grid\Column|Collection alipay_status
     * @property Grid\Column|Collection balance_fee
     * @property Grid\Column|Collection balance_type
     * @property Grid\Column|Collection failed_reason
     * @property Grid\Column|Collection handling_price
     * @property Grid\Column|Collection handling_ratio
     * @property Grid\Column|Collection out_trade_no
     * @property Grid\Column|Collection pay_fund_order_id
     * @property Grid\Column|Collection trans_date
     * @property Grid\Column|Collection fee
     * @property Grid\Column|Collection action_type
     * @property Grid\Column|Collection addtime
     * @property Grid\Column|Collection admin_ip
     * @property Grid\Column|Collection admin_name
     * @property Grid\Column|Collection is_delete
     * @property Grid\Column|Collection obj_id
     * @property Grid\Column|Collection result
     * @property Grid\Column|Collection route
     * @property Grid\Column|Collection store_id
     * @property Grid\Column|Collection create_time
     * @property Grid\Column|Collection unit_id
     * @property Grid\Column|Collection alibaba_json
     * @property Grid\Column|Collection city_id
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection district_id
     * @property Grid\Column|Collection is_default
     * @property Grid\Column|Collection lat
     * @property Grid\Column|Collection lng
     * @property Grid\Column|Collection province_id
     * @property Grid\Column|Collection app_max_count
     * @property Grid\Column|Collection auth_key
     * @property Grid\Column|Collection expire_time
     * @property Grid\Column|Collection permission
     * @property Grid\Column|Collection display_name
     * @property Grid\Column|Collection desc
     * @property Grid\Column|Collection alias_name
     * @property Grid\Column|Collection alipay_logon_id
     * @property Grid\Column|Collection binding_alipay_logon_id
     * @property Grid\Column|Collection biz_cards
     * @property Grid\Column|Collection business_address
     * @property Grid\Column|Collection cert_image
     * @property Grid\Column|Collection cert_image_back
     * @property Grid\Column|Collection cert_name
     * @property Grid\Column|Collection cert_no
     * @property Grid\Column|Collection cert_type
     * @property Grid\Column|Collection contact_infos
     * @property Grid\Column|Collection default_settle_rule
     * @property Grid\Column|Collection external_id
     * @property Grid\Column|Collection invoice_info
     * @property Grid\Column|Collection legal_cert_back_image
     * @property Grid\Column|Collection legal_cert_front_image
     * @property Grid\Column|Collection legal_cert_no
     * @property Grid\Column|Collection legal_cert_type
     * @property Grid\Column|Collection legal_name
     * @property Grid\Column|Collection license_auth_letter_image
     * @property Grid\Column|Collection mcc
     * @property Grid\Column|Collection mch_id
     * @property Grid\Column|Collection merchant_type
     * @property Grid\Column|Collection out_door_images
     * @property Grid\Column|Collection qualifications
     * @property Grid\Column|Collection service
     * @property Grid\Column|Collection service_phone
     * @property Grid\Column|Collection sign_time_with_isv
     * @property Grid\Column|Collection sites
     * @property Grid\Column|Collection smid
     * @property Grid\Column|Collection article_cat_id
     * @property Grid\Column|Collection add_time
     * @property Grid\Column|Collection is_bottom
     * @property Grid\Column|Collection is_show
     * @property Grid\Column|Collection attr_group_id
     * @property Grid\Column|Collection attr_name
     * @property Grid\Column|Collection attr_group_name
     * @property Grid\Column|Collection creator_id
     * @property Grid\Column|Collection permission_name
     * @property Grid\Column|Collection open_type
     * @property Grid\Column|Collection page_url
     * @property Grid\Column|Collection pic_url
     * @property Grid\Column|Collection skip_url
     * @property Grid\Column|Collection begin_time
     * @property Grid\Column|Collection goods_id
     * @property Grid\Column|Collection min_price
     * @property Grid\Column|Collection status_data
     * @property Grid\Column|Collection attr
     * @property Grid\Column|Collection original_price
     * @property Grid\Column|Collection is_mail
     * @property Grid\Column|Collection is_print
     * @property Grid\Column|Collection is_share
     * @property Grid\Column|Collection is_sms
     * @property Grid\Column|Collection share_title
     * @property Grid\Column|Collection initials
     * @property Grid\Column|Collection pinyin
     * @property Grid\Column|Collection parts_id
     * @property Grid\Column|Collection bank_name
     * @property Grid\Column|Collection pay_type
     * @property Grid\Column|Collection service_charge
     * @property Grid\Column|Collection advert_pic
     * @property Grid\Column|Collection advert_url
     * @property Grid\Column|Collection big_pic_url
     * @property Grid\Column|Collection pc_advert_url
     * @property Grid\Column|Collection pc_icon
     * @property Grid\Column|Collection seo_desc
     * @property Grid\Column|Collection seo_keyword
     * @property Grid\Column|Collection subtitle
     * @property Grid\Column|Collection color
     * @property Grid\Column|Collection rgb
     * @property Grid\Column|Collection is_expire
     * @property Grid\Column|Collection key_val
     * @property Grid\Column|Collection sur_price
     * @property Grid\Column|Collection total_price
     * @property Grid\Column|Collection vd_id
     * @property Grid\Column|Collection vl_id
     * @property Grid\Column|Collection appoint_type
     * @property Grid\Column|Collection cat_id_list
     * @property Grid\Column|Collection discount
     * @property Grid\Column|Collection discount_type
     * @property Grid\Column|Collection expire_day
     * @property Grid\Column|Collection expire_type
     * @property Grid\Column|Collection goods_id_list
     * @property Grid\Column|Collection is_integral
     * @property Grid\Column|Collection is_join
     * @property Grid\Column|Collection rule
     * @property Grid\Column|Collection sub_price
     * @property Grid\Column|Collection total_count
     * @property Grid\Column|Collection user_num
     * @property Grid\Column|Collection coupon_id
     * @property Grid\Column|Collection event
     * @property Grid\Column|Collection send_times
     * @property Grid\Column|Collection customer_pwd
     * @property Grid\Column|Collection express_id
     * @property Grid\Column|Collection month_code
     * @property Grid\Column|Collection send_name
     * @property Grid\Column|Collection send_site
     * @property Grid\Column|Collection template_size
     * @property Grid\Column|Collection adverse_distribution
     * @property Grid\Column|Collection adverse_kilometres
     * @property Grid\Column|Collection adverse_lat_and_lon
     * @property Grid\Column|Collection adverse_money
     * @property Grid\Column|Collection lat_and_lon
     * @property Grid\Column|Collection order_time
     * @property Grid\Column|Collection routine_distribution
     * @property Grid\Column|Collection routine_kilometres
     * @property Grid\Column|Collection routine_money
     * @property Grid\Column|Collection adcode
     * @property Grid\Column|Collection citycode
     * @property Grid\Column|Collection level
     * @property Grid\Column|Collection is_index
     * @property Grid\Column|Collection template_id
     * @property Grid\Column|Collection template
     * @property Grid\Column|Collection default
     * @property Grid\Column|Collection required
     * @property Grid\Column|Collection tip
     * @property Grid\Column|Collection form_id
     * @property Grid\Column|Collection is_usable
     * @property Grid\Column|Collection send_count
     * @property Grid\Column|Collection transaction_id
     * @property Grid\Column|Collection wechat_open_id
     * @property Grid\Column|Collection coupon_expire
     * @property Grid\Column|Collection coupon_money
     * @property Grid\Column|Collection coupon_total_money
     * @property Grid\Column|Collection coupon_use_minimum
     * @property Grid\Column|Collection distribute_type
     * @property Grid\Column|Collection is_finish
     * @property Grid\Column|Collection game_open
     * @property Grid\Column|Collection game_time
     * @property Grid\Column|Collection share_pic
     * @property Grid\Column|Collection tpl_msg_id
     * @property Grid\Column|Collection after_sales_id
     * @property Grid\Column|Collection attr_setting_type
     * @property Grid\Column|Collection auto_send
     * @property Grid\Column|Collection auto_vr_cont
     * @property Grid\Column|Collection brand_id
     * @property Grid\Column|Collection card_data
     * @property Grid\Column|Collection confine_count
     * @property Grid\Column|Collection cost_price
     * @property Grid\Column|Collection cover_pic
     * @property Grid\Column|Collection freight
     * @property Grid\Column|Collection full_cut
     * @property Grid\Column|Collection goods_num
     * @property Grid\Column|Collection hot_cakes
     * @property Grid\Column|Collection individual_share
     * @property Grid\Column|Collection is_best
     * @property Grid\Column|Collection is_examine
     * @property Grid\Column|Collection is_hot
     * @property Grid\Column|Collection is_lead
     * @property Grid\Column|Collection is_level
     * @property Grid\Column|Collection is_negotiable
     * @property Grid\Column|Collection is_recycle
     * @property Grid\Column|Collection is_spell
     * @property Grid\Column|Collection isSelf
     * @property Grid\Column|Collection label_id
     * @property Grid\Column|Collection lead_attr
     * @property Grid\Column|Collection lead_price
     * @property Grid\Column|Collection lead_type
     * @property Grid\Column|Collection market_increase
     * @property Grid\Column|Collection mch_is_best
     * @property Grid\Column|Collection mch_is_hot
     * @property Grid\Column|Collection mch_ratio
     * @property Grid\Column|Collection mch_sort
     * @property Grid\Column|Collection member_discount
     * @property Grid\Column|Collection osg_id
     * @property Grid\Column|Collection packing_id
     * @property Grid\Column|Collection payment
     * @property Grid\Column|Collection platform_ratio
     * @property Grid\Column|Collection price_increase
     * @property Grid\Column|Collection purchase_price
     * @property Grid\Column|Collection quick_purchase
     * @property Grid\Column|Collection rebate
     * @property Grid\Column|Collection share_commission_first
     * @property Grid\Column|Collection share_commission_second
     * @property Grid\Column|Collection share_commission_third
     * @property Grid\Column|Collection share_type
     * @property Grid\Column|Collection supplierLoginId
     * @property Grid\Column|Collection unit
     * @property Grid\Column|Collection use_attr
     * @property Grid\Column|Collection video_url
     * @property Grid\Column|Collection virtual_sales
     * @property Grid\Column|Collection vop_id
     * @property Grid\Column|Collection vr_type
     * @property Grid\Column|Collection wareQD
     * @property Grid\Column|Collection wares_id
     * @property Grid\Column|Collection wares_status
     * @property Grid\Column|Collection weight
     * @property Grid\Column|Collection click
     * @property Grid\Column|Collection card_id
     * @property Grid\Column|Collection goods_parts_id
     * @property Grid\Column|Collection relation_id
     * @property Grid\Column|Collection good_id
     * @property Grid\Column|Collection like_id
     * @property Grid\Column|Collection style
     * @property Grid\Column|Collection is_hide
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection is_virtual
     * @property Grid\Column|Collection order_detail_id
     * @property Grid\Column|Collection pic_list
     * @property Grid\Column|Collection reply_content
     * @property Grid\Column|Collection score
     * @property Grid\Column|Collection score_star
     * @property Grid\Column|Collection virtual_avatar
     * @property Grid\Column|Collection virtual_user
     * @property Grid\Column|Collection is_pay
     * @property Grid\Column|Collection goods_pic_list
     * @property Grid\Column|Collection explain
     * @property Grid\Column|Collection operator
     * @property Grid\Column|Collection operator_id
     * @property Grid\Column|Collection address_data
     * @property Grid\Column|Collection apply_delete
     * @property Grid\Column|Collection clerk_id
     * @property Grid\Column|Collection confirm_time
     * @property Grid\Column|Collection express
     * @property Grid\Column|Collection express_no
     * @property Grid\Column|Collection express_price
     * @property Grid\Column|Collection is_cancel
     * @property Grid\Column|Collection is_comment
     * @property Grid\Column|Collection is_offline
     * @property Grid\Column|Collection is_sale
     * @property Grid\Column|Collection is_send
     * @property Grid\Column|Collection offline_qrcode
     * @property Grid\Column|Collection pay_price
     * @property Grid\Column|Collection send_time
     * @property Grid\Column|Collection shop_id
     * @property Grid\Column|Collection words
     * @property Grid\Column|Collection goods_name
     * @property Grid\Column|Collection pay_integral
     * @property Grid\Column|Collection pic
     * @property Grid\Column|Collection integral_shuoming
     * @property Grid\Column|Collection register_continuation
     * @property Grid\Column|Collection register_integral
     * @property Grid\Column|Collection register_reward
     * @property Grid\Column|Collection register_rule
     * @property Grid\Column|Collection taxpayer
     * @property Grid\Column|Collection totalprice
     * @property Grid\Column|Collection skuId
     * @property Grid\Column|Collection cn_name
     * @property Grid\Column|Collection en_name
     * @property Grid\Column|Collection cat_num
     * @property Grid\Column|Collection categoryAttr
     * @property Grid\Column|Collection param
     * @property Grid\Column|Collection saleAttr
     * @property Grid\Column|Collection attr_json
     * @property Grid\Column|Collection cat_attr_id
     * @property Grid\Column|Collection cat_name
     * @property Grid\Column|Collection goods_no
     * @property Grid\Column|Collection is_upsert
     * @property Grid\Column|Collection isEnergySav
     * @property Grid\Column|Collection isEnvironmental
     * @property Grid\Column|Collection packing_list
     * @property Grid\Column|Collection taxCode
     * @property Grid\Column|Collection taxInfo
     * @property Grid\Column|Collection addTime
     * @property Grid\Column|Collection thirdSkuId
     * @property Grid\Column|Collection typeMsg
     * @property Grid\Column|Collection cancel_status
     * @property Grid\Column|Collection cityId
     * @property Grid\Column|Collection countyId
     * @property Grid\Column|Collection invoiceState
     * @property Grid\Column|Collection is_true
     * @property Grid\Column|Collection jjys_order_no
     * @property Grid\Column|Collection provinceId
     * @property Grid\Column|Collection submitStatus
     * @property Grid\Column|Collection townId
     * @property Grid\Column|Collection zip
     * @property Grid\Column|Collection jjys_url
     * @property Grid\Column|Collection purch_appkey
     * @property Grid\Column|Collection purch_appsecret
     * @property Grid\Column|Collection purch_suppliercode
     * @property Grid\Column|Collection supplier_appid
     * @property Grid\Column|Collection supplier_appkey
     * @property Grid\Column|Collection supplier_appsecret
     * @property Grid\Column|Collection buy_prompt
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection level_image
     * @property Grid\Column|Collection synopsis
     * @property Grid\Column|Collection after_level
     * @property Grid\Column|Collection current_level
     * @property Grid\Column|Collection icon_url
     * @property Grid\Column|Collection actype
     * @property Grid\Column|Collection describe
     * @property Grid\Column|Collection follow_num
     * @property Grid\Column|Collection front_img
     * @property Grid\Column|Collection head_img
     * @property Grid\Column|Collection idcard
     * @property Grid\Column|Collection is_recom
     * @property Grid\Column|Collection live_power
     * @property Grid\Column|Collection live_price
     * @property Grid\Column|Collection max_goods
     * @property Grid\Column|Collection nickname
     * @property Grid\Column|Collection real_tel
     * @property Grid\Column|Collection rect_time
     * @property Grid\Column|Collection refuse_desc
     * @property Grid\Column|Collection anchor_id
     * @property Grid\Column|Collection refund_desc
     * @property Grid\Column|Collection unumber
     * @property Grid\Column|Collection goods_type
     * @property Grid\Column|Collection back_img
     * @property Grid\Column|Collection comment_num
     * @property Grid\Column|Collection cover_img
     * @property Grid\Column|Collection endtime
     * @property Grid\Column|Collection fict_like
     * @property Grid\Column|Collection fict_watch
     * @property Grid\Column|Collection get_past
     * @property Grid\Column|Collection like_num
     * @property Grid\Column|Collection play_addr
     * @property Grid\Column|Collection push_addr
     * @property Grid\Column|Collection real_endtime
     * @property Grid\Column|Collection real_starttime
     * @property Grid\Column|Collection sale_goods
     * @property Grid\Column|Collection starttime
     * @property Grid\Column|Collection un_key
     * @property Grid\Column|Collection watch_num
     * @property Grid\Column|Collection cs_drawing
     * @property Grid\Column|Collection cs_overtime
     * @property Grid\Column|Collection cs_setting
     * @property Grid\Column|Collection cs_tips
     * @property Grid\Column|Collection cs_type
     * @property Grid\Column|Collection least_money
     * @property Grid\Column|Collection money_comm
     * @property Grid\Column|Collection upper_money
     * @property Grid\Column|Collection stock
     * @property Grid\Column|Collection update_time
     * @property Grid\Column|Collection child_id
     * @property Grid\Column|Collection lottery_id
     * @property Grid\Column|Collection lucky_code
     * @property Grid\Column|Collection obtain_time
     * @property Grid\Column|Collection raffle_time
     * @property Grid\Column|Collection receive_mail
     * @property Grid\Column|Collection send_mail
     * @property Grid\Column|Collection send_pwd
     * @property Grid\Column|Collection account_money
     * @property Grid\Column|Collection account_type
     * @property Grid\Column|Collection alipay_account_name
     * @property Grid\Column|Collection choice_invoice
     * @property Grid\Column|Collection collection_app_key
     * @property Grid\Column|Collection fictitious_follow
     * @property Grid\Column|Collection header_bg
     * @property Grid\Column|Collection is_invoice
     * @property Grid\Column|Collection is_lock
     * @property Grid\Column|Collection is_open
     * @property Grid\Column|Collection is_popular
     * @property Grid\Column|Collection latitude
     * @property Grid\Column|Collection logo
     * @property Grid\Column|Collection longitude
     * @property Grid\Column|Collection main_content
     * @property Grid\Column|Collection mch_common_cat_id
     * @property Grid\Column|Collection mch_message
     * @property Grid\Column|Collection mch_money
     * @property Grid\Column|Collection mch_money_status
     * @property Grid\Column|Collection mch_type
     * @property Grid\Column|Collection o2o_cat_id
     * @property Grid\Column|Collection realname
     * @property Grid\Column|Collection review_result
     * @property Grid\Column|Collection review_status
     * @property Grid\Column|Collection review_time
     * @property Grid\Column|Collection service_tel
     * @property Grid\Column|Collection summary
     * @property Grid\Column|Collection tel
     * @property Grid\Column|Collection transfer_rate
     * @property Grid\Column|Collection wechat_name
     * @property Grid\Column|Collection wx_account_name
     * @property Grid\Column|Collection rate_data
     * @property Grid\Column|Collection type_data
     * @property Grid\Column|Collection virtual_type
     * @property Grid\Column|Collection ctr_type
     * @property Grid\Column|Collection edittime
     * @property Grid\Column|Collection audit_notes
     * @property Grid\Column|Collection audit_time
     * @property Grid\Column|Collection ctr_id
     * @property Grid\Column|Collection is_agree
     * @property Grid\Column|Collection ms_id
     * @property Grid\Column|Collection top_time
     * @property Grid\Column|Collection group
     * @property Grid\Column|Collection is_read
     * @property Grid\Column|Collection is_sound
     * @property Grid\Column|Collection is_enable
     * @property Grid\Column|Collection visit_date
     * @property Grid\Column|Collection open_time
     * @property Grid\Column|Collection buy_limit
     * @property Grid\Column|Collection buy_max
     * @property Grid\Column|Collection open_date
     * @property Grid\Column|Collection coupon
     * @property Grid\Column|Collection is_discount
     * @property Grid\Column|Collection sales
     * @property Grid\Column|Collection before_update_express
     * @property Grid\Column|Collection before_update_price
     * @property Grid\Column|Collection coupon_sub_price
     * @property Grid\Column|Collection express_price_1
     * @property Grid\Column|Collection first_price
     * @property Grid\Column|Collection give_integral
     * @property Grid\Column|Collection integral_amount
     * @property Grid\Column|Collection is_partner
     * @property Grid\Column|Collection is_price
     * @property Grid\Column|Collection is_revoke
     * @property Grid\Column|Collection is_sum
     * @property Grid\Column|Collection is_transfer
     * @property Grid\Column|Collection limit_time
     * @property Grid\Column|Collection order_source
     * @property Grid\Column|Collection parent_id_1
     * @property Grid\Column|Collection parent_id_2
     * @property Grid\Column|Collection second_price
     * @property Grid\Column|Collection seller_comments
     * @property Grid\Column|Collection share_price
     * @property Grid\Column|Collection third_price
     * @property Grid\Column|Collection user_coupon_id
     * @property Grid\Column|Collection mch_describe
     * @property Grid\Column|Collection mch_logistics
     * @property Grid\Column|Collection mch_service
     * @property Grid\Column|Collection address_id
     * @property Grid\Column|Collection is_return
     * @property Grid\Column|Collection is_user_send
     * @property Grid\Column|Collection order_refund_no
     * @property Grid\Column|Collection refund_price
     * @property Grid\Column|Collection response_time
     * @property Grid\Column|Collection return_express
     * @property Grid\Column|Collection return_express_no
     * @property Grid\Column|Collection user_send_express
     * @property Grid\Column|Collection user_send_express_no
     * @property Grid\Column|Collection is_area
     * @property Grid\Column|Collection unpaid
     * @property Grid\Column|Collection appeal_img
     * @property Grid\Column|Collection appeal_status
     * @property Grid\Column|Collection appeal_text
     * @property Grid\Column|Collection appeal_type
     * @property Grid\Column|Collection comment_id
     * @property Grid\Column|Collection is_appeal
     * @property Grid\Column|Collection coupon_amount
     * @property Grid\Column|Collection coupon_name
     * @property Grid\Column|Collection coupon_stock
     * @property Grid\Column|Collection coupon_type
     * @property Grid\Column|Collection period_validity
     * @property Grid\Column|Collection restriction_type
     * @property Grid\Column|Collection times_collection
     * @property Grid\Column|Collection use_threshold
     * @property Grid\Column|Collection full_reduction
     * @property Grid\Column|Collection cancel_type
     * @property Grid\Column|Collection express_rider
     * @property Grid\Column|Collection express_tel
     * @property Grid\Column|Collection full_price
     * @property Grid\Column|Collection invoice_id
     * @property Grid\Column|Collection invoice_type
     * @property Grid\Column|Collection is_full
     * @property Grid\Column|Collection is_overtime
     * @property Grid\Column|Collection is_reply
     * @property Grid\Column|Collection is_reservation
     * @property Grid\Column|Collection order_status
     * @property Grid\Column|Collection reply_time
     * @property Grid\Column|Collection reservation_time
     * @property Grid\Column|Collection packing_fee
     * @property Grid\Column|Collection reality_price
     * @property Grid\Column|Collection dada_api_url
     * @property Grid\Column|Collection dada_id
     * @property Grid\Column|Collection dada_key
     * @property Grid\Column|Collection dada_secret
     * @property Grid\Column|Collection dada_shop_id
     * @property Grid\Column|Collection delivery_method
     * @property Grid\Column|Collection end_hours
     * @property Grid\Column|Collection fengniao_api_url
     * @property Grid\Column|Collection fengniao_id
     * @property Grid\Column|Collection fengniao_key
     * @property Grid\Column|Collection is_bad_weather
     * @property Grid\Column|Collection is_dial
     * @property Grid\Column|Collection is_evaluate
     * @property Grid\Column|Collection is_self_mention
     * @property Grid\Column|Collection meituan_api_url
     * @property Grid\Column|Collection meituan_id
     * @property Grid\Column|Collection meituan_key
     * @property Grid\Column|Collection shansong_api_url
     * @property Grid\Column|Collection shansong_id
     * @property Grid\Column|Collection shansong_key
     * @property Grid\Column|Collection shop_notices
     * @property Grid\Column|Collection start_hours
     * @property Grid\Column|Collection virtual_delivery_time
     * @property Grid\Column|Collection ali_is_pay
     * @property Grid\Column|Collection ali_order_no
     * @property Grid\Column|Collection ali_refund
     * @property Grid\Column|Collection ali_sum_price
     * @property Grid\Column|Collection consumer_id
     * @property Grid\Column|Collection consumer_price
     * @property Grid\Column|Collection currency
     * @property Grid\Column|Collection is_balance
     * @property Grid\Column|Collection is_live
     * @property Grid\Column|Collection is_live_price
     * @property Grid\Column|Collection is_quick
     * @property Grid\Column|Collection jdvop_is_invoice
     * @property Grid\Column|Collection jdvop_is_pay
     * @property Grid\Column|Collection jdvop_order_no
     * @property Grid\Column|Collection jdvop_refund
     * @property Grid\Column|Collection jdvop_sum_price
     * @property Grid\Column|Collection live_id
     * @property Grid\Column|Collection order_union_id
     * @property Grid\Column|Collection send_email
     * @property Grid\Column|Collection user_dedu_balance
     * @property Grid\Column|Collection consumer_card_id
     * @property Grid\Column|Collection is_exchange
     * @property Grid\Column|Collection ordedr_sn
     * @property Grid\Column|Collection ali_unit_price
     * @property Grid\Column|Collection parts_price
     * @property Grid\Column|Collection vr_data_id
     * @property Grid\Column|Collection vr_list_id
     * @property Grid\Column|Collection EBusinessID
     * @property Grid\Column|Collection express_code
     * @property Grid\Column|Collection printTeplate
     * @property Grid\Column|Collection ali_json
     * @property Grid\Column|Collection ali_refund_Id
     * @property Grid\Column|Collection parent_id_3
     * @property Grid\Column|Collection order_id_list
     * @property Grid\Column|Collection diff_money
     * @property Grid\Column|Collection finish
     * @property Grid\Column|Collection info
     * @property Grid\Column|Collection out_order_no
     * @property Grid\Column|Collection sub_mchid
     * @property Grid\Column|Collection bank_memo
     * @property Grid\Column|Collection out_request_no
     * @property Grid\Column|Collection withdraw_id
     * @property Grid\Column|Collection gift_id
     * @property Grid\Column|Collection image_url
     * @property Grid\Column|Collection orderby
     * @property Grid\Column|Collection pond_id
     * @property Grid\Column|Collection deplete_register
     * @property Grid\Column|Collection oppty
     * @property Grid\Column|Collection probability
     * @property Grid\Column|Collection printer_setting
     * @property Grid\Column|Collection printer_type
     * @property Grid\Column|Collection big
     * @property Grid\Column|Collection block_id
     * @property Grid\Column|Collection is_attr
     * @property Grid\Column|Collection printer_id
     * @property Grid\Column|Collection colonel
     * @property Grid\Column|Collection group_num
     * @property Grid\Column|Collection grouptime
     * @property Grid\Column|Collection is_more
     * @property Grid\Column|Collection is_only
     * @property Grid\Column|Collection one_buy_limit
     * @property Grid\Column|Collection group_time
     * @property Grid\Column|Collection class_group
     * @property Grid\Column|Collection is_group
     * @property Grid\Column|Collection is_returnd
     * @property Grid\Column|Collection is_success
     * @property Grid\Column|Collection offline
     * @property Grid\Column|Collection success_time
     * @property Grid\Column|Collection avatar_position
     * @property Grid\Column|Collection avatar_size
     * @property Grid\Column|Collection font
     * @property Grid\Column|Collection font_position
     * @property Grid\Column|Collection preview
     * @property Grid\Column|Collection qrcode_bg
     * @property Grid\Column|Collection qrcode_position
     * @property Grid\Column|Collection qrcode_size
     * @property Grid\Column|Collection send_price
     * @property Grid\Column|Collection continuation
     * @property Grid\Column|Collection register_time
     * @property Grid\Column|Collection account_info
     * @property Grid\Column|Collection applyment_id
     * @property Grid\Column|Collection business_addition_desc
     * @property Grid\Column|Collection business_addition_pics
     * @property Grid\Column|Collection business_license_info
     * @property Grid\Column|Collection contact_info
     * @property Grid\Column|Collection id_card_info
     * @property Grid\Column|Collection id_doc_info
     * @property Grid\Column|Collection id_doc_type
     * @property Grid\Column|Collection merchant_shortname
     * @property Grid\Column|Collection need_account_info
     * @property Grid\Column|Collection organization_cert_info
     * @property Grid\Column|Collection organization_type
     * @property Grid\Column|Collection sales_scene_info
     * @property Grid\Column|Collection company
     * @property Grid\Column|Collection delivery_id
     * @property Grid\Column|Collection exp_area
     * @property Grid\Column|Collection post_code
     * @property Grid\Column|Collection expire
     * @property Grid\Column|Collection agree
     * @property Grid\Column|Collection auto_share_val
     * @property Grid\Column|Collection bank
     * @property Grid\Column|Collection condition
     * @property Grid\Column|Collection first
     * @property Grid\Column|Collection first_name
     * @property Grid\Column|Collection is_rebate
     * @property Grid\Column|Collection min_money
     * @property Grid\Column|Collection pic_url_1
     * @property Grid\Column|Collection pic_url_2
     * @property Grid\Column|Collection price_type
     * @property Grid\Column|Collection remaining_sum
     * @property Grid\Column|Collection second_name
     * @property Grid\Column|Collection share_condition
     * @property Grid\Column|Collection share_good_id
     * @property Grid\Column|Collection share_good_status
     * @property Grid\Column|Collection third
     * @property Grid\Column|Collection third_name
     * @property Grid\Column|Collection cover_url
     * @property Grid\Column|Collection shop_time
     * @property Grid\Column|Collection fictitious_collection
     * @property Grid\Column|Collection fictitious_forward
     * @property Grid\Column|Collection fictitious_give
     * @property Grid\Column|Collection fictitious_play
     * @property Grid\Column|Collection short_video_id
     * @property Grid\Column|Collection tpl
     * @property Grid\Column|Collection AccessKeyId
     * @property Grid\Column|Collection AccessKeySecret
     * @property Grid\Column|Collection tpl_code
     * @property Grid\Column|Collection tpl_refund
     * @property Grid\Column|Collection next_full
     * @property Grid\Column|Collection next_reduce
     * @property Grid\Column|Collection reduce
     * @property Grid\Column|Collection spell_id
     * @property Grid\Column|Collection full
     * @property Grid\Column|Collection effective_time
     * @property Grid\Column|Collection bail_currency
     * @property Grid\Column|Collection step_num
     * @property Grid\Column|Collection step_currency
     * @property Grid\Column|Collection step_id
     * @property Grid\Column|Collection type_id
     * @property Grid\Column|Collection activity_rule
     * @property Grid\Column|Collection convert_max
     * @property Grid\Column|Collection convert_ratio
     * @property Grid\Column|Collection invite_ratio
     * @property Grid\Column|Collection qrcode_title
     * @property Grid\Column|Collection ranking_num
     * @property Grid\Column|Collection remind_time
     * @property Grid\Column|Collection ratio
     * @property Grid\Column|Collection remind
     * @property Grid\Column|Collection acid
     * @property Grid\Column|Collection after_sale_time
     * @property Grid\Column|Collection buy_member
     * @property Grid\Column|Collection cat_goods_cols
     * @property Grid\Column|Collection cat_goods_count
     * @property Grid\Column|Collection cat_style
     * @property Grid\Column|Collection copyright
     * @property Grid\Column|Collection copyright_pic_url
     * @property Grid\Column|Collection copyright_url
     * @property Grid\Column|Collection cut_thread
     * @property Grid\Column|Collection delivery_time
     * @property Grid\Column|Collection dial
     * @property Grid\Column|Collection dial_pic
     * @property Grid\Column|Collection good_negotiable
     * @property Grid\Column|Collection home_page_module
     * @property Grid\Column|Collection integration
     * @property Grid\Column|Collection is_coupon
     * @property Grid\Column|Collection is_member
     * @property Grid\Column|Collection is_member_price
     * @property Grid\Column|Collection is_official_account
     * @property Grid\Column|Collection is_outh_open
     * @property Grid\Column|Collection is_quick_order
     * @property Grid\Column|Collection is_sales
     * @property Grid\Column|Collection is_share_price
     * @property Grid\Column|Collection kdniao_api_key
     * @property Grid\Column|Collection kdniao_mch_id
     * @property Grid\Column|Collection member_content
     * @property Grid\Column|Collection nav_count
     * @property Grid\Column|Collection o2o_max_distance
     * @property Grid\Column|Collection order_send_tpl
     * @property Grid\Column|Collection over_day
     * @property Grid\Column|Collection purchase_frame
     * @property Grid\Column|Collection quick_order_type
     * @property Grid\Column|Collection quick_user_type
     * @property Grid\Column|Collection recommend_count
     * @property Grid\Column|Collection search_hot_content
     * @property Grid\Column|Collection search_hot_open
     * @property Grid\Column|Collection send_type
     * @property Grid\Column|Collection show_customer_service
     * @property Grid\Column|Collection use_wechat_platform_pay
     * @property Grid\Column|Collection wechat_app_id
     * @property Grid\Column|Collection wechat_platform_id
     * @property Grid\Column|Collection class
     * @property Grid\Column|Collection delay_seconds
     * @property Grid\Column|Collection is_executed
     * @property Grid\Column|Collection params
     * @property Grid\Column|Collection tpl_id
     * @property Grid\Column|Collection tpl_name
     * @property Grid\Column|Collection cat_template
     * @property Grid\Column|Collection deliveryDay
     * @property Grid\Column|Collection EfficientGoodsCardNum
     * @property Grid\Column|Collection EfficientGoodsCardOrgan
     * @property Grid\Column|Collection EfficientGoodsImagePath
     * @property Grid\Column|Collection energy_type
     * @property Grid\Column|Collection import_type
     * @property Grid\Column|Collection model_number
     * @property Grid\Column|Collection protection_type
     * @property Grid\Column|Collection sku
     * @property Grid\Column|Collection dep_name
     * @property Grid\Column|Collection drawer_name
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection invoice
     * @property Grid\Column|Collection invoice_title
     * @property Grid\Column|Collection mode
     * @property Grid\Column|Collection order_price
     * @property Grid\Column|Collection total
     * @property Grid\Column|Collection yggc_order
     * @property Grid\Column|Collection unitPrice
     * @property Grid\Column|Collection agree_count
     * @property Grid\Column|Collection is_chosen
     * @property Grid\Column|Collection layout
     * @property Grid\Column|Collection qrcode_pic
     * @property Grid\Column|Collection read_count
     * @property Grid\Column|Collection sub_title
     * @property Grid\Column|Collection virtual_agree_count
     * @property Grid\Column|Collection virtual_favorite_count
     * @property Grid\Column|Collection virtual_read_count
     * @property Grid\Column|Collection topic_id
     * @property Grid\Column|Collection aliyun
     * @property Grid\Column|Collection qcloud
     * @property Grid\Column|Collection qiniu
     * @property Grid\Column|Collection storage_type
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection file_name
     * @property Grid\Column|Collection file_url
     * @property Grid\Column|Collection group_id
     * @property Grid\Column|Collection img_height
     * @property Grid\Column|Collection img_width
     * @property Grid\Column|Collection size
     * @property Grid\Column|Collection app_source
     * @property Grid\Column|Collection apple_openid
     * @property Grid\Column|Collection avatar_url
     * @property Grid\Column|Collection binding
     * @property Grid\Column|Collection blacklist
     * @property Grid\Column|Collection clientid
     * @property Grid\Column|Collection comments
     * @property Grid\Column|Collection contact_way
     * @property Grid\Column|Collection is_app
     * @property Grid\Column|Collection is_clerk
     * @property Grid\Column|Collection is_distributor
     * @property Grid\Column|Collection is_web
     * @property Grid\Column|Collection parent_user_id
     * @property Grid\Column|Collection saas_id
     * @property Grid\Column|Collection total_integral
     * @property Grid\Column|Collection wechat_platform_open_id
     * @property Grid\Column|Collection wechat_union_id
     * @property Grid\Column|Collection is_pass
     * @property Grid\Column|Collection card_content
     * @property Grid\Column|Collection card_name
     * @property Grid\Column|Collection card_pic_url
     * @property Grid\Column|Collection clerk_time
     * @property Grid\Column|Collection is_use
     * @property Grid\Column|Collection surplus
     * @property Grid\Column|Collection coupon_auto_send_id
     * @property Grid\Column|Collection mode_value
     * @property Grid\Column|Collection times
     * @property Grid\Column|Collection after_change
     * @property Grid\Column|Collection before_change
     * @property Grid\Column|Collection is_consumer_card
     * @property Grid\Column|Collection key_name
     * @property Grid\Column|Collection pasttime
     * @property Grid\Column|Collection role_tab
     * @property Grid\Column|Collection use_dis
     * @property Grid\Column|Collection usetime
     * @property Grid\Column|Collection vcd_sort
     * @property Grid\Column|Collection vr_cat
     * @property Grid\Column|Collection key_salt
     * @property Grid\Column|Collection role_cont
     * @property Grid\Column|Collection use_order
     * @property Grid\Column|Collection use_uid
     * @property Grid\Column|Collection vcd_id
     * @property Grid\Column|Collection vcl_sort
     * @property Grid\Column|Collection examine_msg
     * @property Grid\Column|Collection app_secret
     * @property Grid\Column|Collection cert_pem
     * @property Grid\Column|Collection key_pem
     * @property Grid\Column|Collection original_id
     * @property Grid\Column|Collection uni_app_id
     * @property Grid\Column|Collection web_app_id
     * @property Grid\Column|Collection web_app_secret
     * @property Grid\Column|Collection api_key
     * @property Grid\Column|Collection apiv3_key
     * @property Grid\Column|Collection platform_cert_date
     * @property Grid\Column|Collection platform_cert_pem
     * @property Grid\Column|Collection platform_serial_no
     * @property Grid\Column|Collection serial_no
     * @property Grid\Column|Collection not_pay_tpl
     * @property Grid\Column|Collection pay_tpl
     * @property Grid\Column|Collection refund_tpl
     * @property Grid\Column|Collection revoke_tpl
     * @property Grid\Column|Collection send_tpl
     * @property Grid\Column|Collection create_comment_tab
     * @property Grid\Column|Collection create_goods_tab
     * @property Grid\Column|Collection create_like_tab
     * @property Grid\Column|Collection feeds_img
     * @property Grid\Column|Collection feeds_img_link
     * @property Grid\Column|Collection goods_list
     * @property Grid\Column|Collection live_backimg
     * @property Grid\Column|Collection live_backimg_link
     * @property Grid\Column|Collection live_nickname
     * @property Grid\Column|Collection live_size
     * @property Grid\Column|Collection live_title
     * @property Grid\Column|Collection live_type
     * @property Grid\Column|Collection notice_url
     * @property Grid\Column|Collection push_url
     * @property Grid\Column|Collection res_desc
     * @property Grid\Column|Collection room_id
     * @property Grid\Column|Collection share_img
     * @property Grid\Column|Collection share_img_link
     * @property Grid\Column|Collection wx_account
     * @property Grid\Column|Collection wxll_desc
     * @property Grid\Column|Collection audit_id
     * @property Grid\Column|Collection cover_img_url
     * @property Grid\Column|Collection end_price
     * @property Grid\Column|Collection jump_url
     * @property Grid\Column|Collection start_price
     * @property Grid\Column|Collection third_party_tag
     * @property Grid\Column|Collection wx_goods_id
     * @property Grid\Column|Collection anchor_name
     * @property Grid\Column|Collection goods
     * @property Grid\Column|Collection goods_shelves
     * @property Grid\Column|Collection is_pull_replay
     * @property Grid\Column|Collection live_status
     * @property Grid\Column|Collection roomid
     * @property Grid\Column|Collection wx_goods_ids
     * @property Grid\Column|Collection media_url
     * @property Grid\Column|Collection is_refund
     * @property Grid\Column|Collection refund_time
     * @property Grid\Column|Collection use_time
     * @property Grid\Column|Collection cat
     * @property Grid\Column|Collection refund_notice
     * @property Grid\Column|Collection success_notice
     * @property Grid\Column|Collection consigneeAddress
     * @property Grid\Column|Collection consigneeMobile
     * @property Grid\Column|Collection consigneeName
     * @property Grid\Column|Collection creatorMobile
     * @property Grid\Column|Collection creatorName
     * @property Grid\Column|Collection creatorOrgName
     * @property Grid\Column|Collection invoiceAddress
     * @property Grid\Column|Collection invoiceTitle
     * @property Grid\Column|Collection invoiceType
     * @property Grid\Column|Collection itins
     * @property Grid\Column|Collection payOrgName
     * @property Grid\Column|Collection telephone
     * @property Grid\Column|Collection yc_order_no
     * @property Grid\Column|Collection zycg_url
     * @property Grid\Column|Collection discountRate
     * @property Grid\Column|Collection colour
     * @property Grid\Column|Collection rate
     * @property Grid\Column|Collection companyCustNo
     * @property Grid\Column|Collection invoiceAccount
     * @property Grid\Column|Collection invoiceAddr
     * @property Grid\Column|Collection invoiceBank
     * @property Grid\Column|Collection invoiceContent
     * @property Grid\Column|Collection orderId
     * @property Grid\Column|Collection orderType
     * @property Grid\Column|Collection receiverName
     * @property Grid\Column|Collection servFee
     * @property Grid\Column|Collection taxno
     * @property Grid\Column|Collection tradeNo
     * @property Grid\Column|Collection region_id
     * @property Grid\Column|Collection region_name
     * @property Grid\Column|Collection region_type
     * @property Grid\Column|Collection zzds_url
     *
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection alias(string $label = null)
     * @method Grid\Column|Collection authors(string $label = null)
     * @method Grid\Column|Collection enable(string $label = null)
     * @method Grid\Column|Collection imported(string $label = null)
     * @method Grid\Column|Collection config(string $label = null)
     * @method Grid\Column|Collection require(string $label = null)
     * @method Grid\Column|Collection require_dev(string $label = null)
     * @method Grid\Column|Collection width(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection img_url(string $label = null)
     * @method Grid\Column|Collection position(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection uid(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection input(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection is_del(string $label = null)
     * @method Grid\Column|Collection pidcard(string $label = null)
     * @method Grid\Column|Collection pname(string $label = null)
     * @method Grid\Column|Collection pphone(string $label = null)
     * @method Grid\Column|Collection company_code(string $label = null)
     * @method Grid\Column|Collection contact_name(string $label = null)
     * @method Grid\Column|Collection contact_tel(string $label = null)
     * @method Grid\Column|Collection date(string $label = null)
     * @method Grid\Column|Collection flight_no(string $label = null)
     * @method Grid\Column|Collection from(string $label = null)
     * @method Grid\Column|Collection item_id(string $label = null)
     * @method Grid\Column|Collection order_no(string $label = null)
     * @method Grid\Column|Collection passagers(string $label = null)
     * @method Grid\Column|Collection pay_channel(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection seat_code(string $label = null)
     * @method Grid\Column|Collection to(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection assets_name(string $label = null)
     * @method Grid\Column|Collection assets_type_id(string $label = null)
     * @method Grid\Column|Collection change_times(string $label = null)
     * @method Grid\Column|Collection freeze_amount(string $label = null)
     * @method Grid\Column|Collection amount_before_change(string $label = null)
     * @method Grid\Column|Collection operate_type(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection tx_hash(string $label = null)
     * @method Grid\Column|Collection user_agent(string $label = null)
     * @method Grid\Column|Collection can_withdraw(string $label = null)
     * @method Grid\Column|Collection contract_address(string $label = null)
     * @method Grid\Column|Collection large_withdraw_amount(string $label = null)
     * @method Grid\Column|Collection recharge_status(string $label = null)
     * @method Grid\Column|Collection withdraw_fee(string $label = null)
     * @method Grid\Column|Collection id_card(string $label = null)
     * @method Grid\Column|Collection id_card_img(string $label = null)
     * @method Grid\Column|Collection id_card_people_img(string $label = null)
     * @method Grid\Column|Collection msg(string $label = null)
     * @method Grid\Column|Collection reason(string $label = null)
     * @method Grid\Column|Collection img(string $label = null)
     * @method Grid\Column|Collection img2(string $label = null)
     * @method Grid\Column|Collection img_details1(string $label = null)
     * @method Grid\Column|Collection img_details2(string $label = null)
     * @method Grid\Column|Collection img_details3(string $label = null)
     * @method Grid\Column|Collection phone(string $label = null)
     * @method Grid\Column|Collection work(string $label = null)
     * @method Grid\Column|Collection sort(string $label = null)
     * @method Grid\Column|Collection banners(string $label = null)
     * @method Grid\Column|Collection business_apply_id(string $label = null)
     * @method Grid\Column|Collection category_id(string $label = null)
     * @method Grid\Column|Collection city(string $label = null)
     * @method Grid\Column|Collection contact_number(string $label = null)
     * @method Grid\Column|Collection district(string $label = null)
     * @method Grid\Column|Collection is_recommend(string $label = null)
     * @method Grid\Column|Collection is_status(string $label = null)
     * @method Grid\Column|Collection lg(string $label = null)
     * @method Grid\Column|Collection limit_price(string $label = null)
     * @method Grid\Column|Collection lt(string $label = null)
     * @method Grid\Column|Collection main_business(string $label = null)
     * @method Grid\Column|Collection province(string $label = null)
     * @method Grid\Column|Collection run_time(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection code(string $label = null)
     * @method Grid\Column|Collection p_code(string $label = null)
     * @method Grid\Column|Collection new_user_number(string $label = null)
     * @method Grid\Column|Collection total_consumption(string $label = null)
     * @method Grid\Column|Collection user_active(string $label = null)
     * @method Grid\Column|Collection user_number(string $label = null)
     * @method Grid\Column|Collection yesterday_consumption(string $label = null)
     * @method Grid\Column|Collection oid(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection usdt_amount(string $label = null)
     * @method Grid\Column|Collection user_name(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection activityState(string $label = null)
     * @method Grid\Column|Collection consumer_uid(string $label = null)
     * @method Grid\Column|Collection role(string $label = null)
     * @method Grid\Column|Collection business_uid(string $label = null)
     * @method Grid\Column|Collection is_confirm(string $label = null)
     * @method Grid\Column|Collection profit_price(string $label = null)
     * @method Grid\Column|Collection profit_ratio(string $label = null)
     * @method Grid\Column|Collection shop_order_id(string $label = null)
     * @method Grid\Column|Collection order_id(string $label = null)
     * @method Grid\Column|Collection submenu(string $label = null)
     * @method Grid\Column|Collection cat_id(string $label = null)
     * @method Grid\Column|Collection data(string $label = null)
     * @method Grid\Column|Collection error(string $label = null)
     * @method Grid\Column|Collection log(string $label = null)
     * @method Grid\Column|Collection import_day(string $label = null)
     * @method Grid\Column|Collection line_up(string $label = null)
     * @method Grid\Column|Collection member_gl_oid(string $label = null)
     * @method Grid\Column|Collection pay_status(string $label = null)
     * @method Grid\Column|Collection to_be_added_integral(string $label = null)
     * @method Grid\Column|Collection to_status(string $label = null)
     * @method Grid\Column|Collection order_nos(string $label = null)
     * @method Grid\Column|Collection return_type(string $label = null)
     * @method Grid\Column|Collection trade_no(string $label = null)
     * @method Grid\Column|Collection aid(string $label = null)
     * @method Grid\Column|Collection bill_state(string $label = null)
     * @method Grid\Column|Collection bill_time(string $label = null)
     * @method Grid\Column|Collection ctime(string $label = null)
     * @method Grid\Column|Collection etime(string $label = null)
     * @method Grid\Column|Collection idcard_no(string $label = null)
     * @method Grid\Column|Collection idcard_type(string $label = null)
     * @method Grid\Column|Collection legs(string $label = null)
     * @method Grid\Column|Collection order_state(string $label = null)
     * @method Grid\Column|Collection order_type(string $label = null)
     * @method Grid\Column|Collection other_fee(string $label = null)
     * @method Grid\Column|Collection passenger_name(string $label = null)
     * @method Grid\Column|Collection passenger_tel(string $label = null)
     * @method Grid\Column|Collection pay_cash(string $label = null)
     * @method Grid\Column|Collection recevie_station(string $label = null)
     * @method Grid\Column|Collection refund_fee(string $label = null)
     * @method Grid\Column|Collection seat_type(string $label = null)
     * @method Grid\Column|Collection start_station(string $label = null)
     * @method Grid\Column|Collection start_time(string $label = null)
     * @method Grid\Column|Collection ticket_no(string $label = null)
     * @method Grid\Column|Collection total_face_price(string $label = null)
     * @method Grid\Column|Collection total_other_fee(string $label = null)
     * @method Grid\Column|Collection total_pay_cash(string $label = null)
     * @method Grid\Column|Collection total_refund_amount(string $label = null)
     * @method Grid\Column|Collection train_no(string $label = null)
     * @method Grid\Column|Collection utime(string $label = null)
     * @method Grid\Column|Collection child_ages(string $label = null)
     * @method Grid\Column|Collection child_num(string $label = null)
     * @method Grid\Column|Collection contact_email(string $label = null)
     * @method Grid\Column|Collection contact_phone(string $label = null)
     * @method Grid\Column|Collection customer_arrive_time(string $label = null)
     * @method Grid\Column|Collection customer_name(string $label = null)
     * @method Grid\Column|Collection goods_title(string $label = null)
     * @method Grid\Column|Collection hotel_id(string $label = null)
     * @method Grid\Column|Collection in_date(string $label = null)
     * @method Grid\Column|Collection man(string $label = null)
     * @method Grid\Column|Collection money(string $label = null)
     * @method Grid\Column|Collection out_date(string $label = null)
     * @method Grid\Column|Collection special_remarks(string $label = null)
     * @method Grid\Column|Collection count_lk(string $label = null)
     * @method Grid\Column|Collection count_profit_price(string $label = null)
     * @method Grid\Column|Collection day(string $label = null)
     * @method Grid\Column|Collection dr_count(string $label = null)
     * @method Grid\Column|Collection other_price(string $label = null)
     * @method Grid\Column|Collection price_10(string $label = null)
     * @method Grid\Column|Collection price_20(string $label = null)
     * @method Grid\Column|Collection price_5(string $label = null)
     * @method Grid\Column|Collection switch(string $label = null)
     * @method Grid\Column|Collection create_type(string $label = null)
     * @method Grid\Column|Collection has_child(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection num(string $label = null)
     * @method Grid\Column|Collection order_mobile_id(string $label = null)
     * @method Grid\Column|Collection account(string $label = null)
     * @method Grid\Column|Collection balance(string $label = null)
     * @method Grid\Column|Collection bill_cycle(string $label = null)
     * @method Grid\Column|Collection content_id(string $label = null)
     * @method Grid\Column|Collection contract_no(string $label = null)
     * @method Grid\Column|Collection item4(string $label = null)
     * @method Grid\Column|Collection pay_amount(string $label = null)
     * @method Grid\Column|Collection penalty(string $label = null)
     * @method Grid\Column|Collection prepaid_flag(string $label = null)
     * @method Grid\Column|Collection card_list(string $label = null)
     * @method Grid\Column|Collection channel(string $label = null)
     * @method Grid\Column|Collection created_time(string $label = null)
     * @method Grid\Column|Collection end_time(string $label = null)
     * @method Grid\Column|Collection out_trans_id(string $label = null)
     * @method Grid\Column|Collection party_order_id(string $label = null)
     * @method Grid\Column|Collection pay_amt(string $label = null)
     * @method Grid\Column|Collection pid(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection img_back(string $label = null)
     * @method Grid\Column|Collection img_just(string $label = null)
     * @method Grid\Column|Collection num_id(string $label = null)
     * @method Grid\Column|Collection second(string $label = null)
     * @method Grid\Column|Collection business(string $label = null)
     * @method Grid\Column|Collection business_lk_iets(string $label = null)
     * @method Grid\Column|Collection consumer(string $label = null)
     * @method Grid\Column|Collection consumer_lk_iets(string $label = null)
     * @method Grid\Column|Collection join_business(string $label = null)
     * @method Grid\Column|Collection join_consumer(string $label = null)
     * @method Grid\Column|Collection market(string $label = null)
     * @method Grid\Column|Collection new_business(string $label = null)
     * @method Grid\Column|Collection people(string $label = null)
     * @method Grid\Column|Collection platform(string $label = null)
     * @method Grid\Column|Collection share(string $label = null)
     * @method Grid\Column|Collection welfare(string $label = null)
     * @method Grid\Column|Collection reorder_id(string $label = null)
     * @method Grid\Column|Collection key(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection is_add_points(string $label = null)
     * @method Grid\Column|Collection sign_date(string $label = null)
     * @method Grid\Column|Collection total_num(string $label = null)
     * @method Grid\Column|Collection yx_uid(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection integral(string $label = null)
     * @method Grid\Column|Collection modified_time(string $label = null)
     * @method Grid\Column|Collection need_fee(string $label = null)
     * @method Grid\Column|Collection numeric(string $label = null)
     * @method Grid\Column|Collection order_from(string $label = null)
     * @method Grid\Column|Collection pay_time(string $label = null)
     * @method Grid\Column|Collection remarks(string $label = null)
     * @method Grid\Column|Collection telecom(string $label = null)
     * @method Grid\Column|Collection admin_id(string $label = null)
     * @method Grid\Column|Collection assets_id(string $label = null)
     * @method Grid\Column|Collection assets_type(string $label = null)
     * @method Grid\Column|Collection block_hash(string $label = null)
     * @method Grid\Column|Collection block_number(string $label = null)
     * @method Grid\Column|Collection data_id(string $label = null)
     * @method Grid\Column|Collection deal_type(string $label = null)
     * @method Grid\Column|Collection gas_price(string $label = null)
     * @method Grid\Column|Collection hash(string $label = null)
     * @method Grid\Column|Collection payee(string $label = null)
     * @method Grid\Column|Collection token_tx_amount(string $label = null)
     * @method Grid\Column|Collection tx_status(string $label = null)
     * @method Grid\Column|Collection access_token(string $label = null)
     * @method Grid\Column|Collection alipay_alipay_user_id(string $label = null)
     * @method Grid\Column|Collection alipay_user_id(string $label = null)
     * @method Grid\Column|Collection app_id(string $label = null)
     * @method Grid\Column|Collection auth_code(string $label = null)
     * @method Grid\Column|Collection expires_in(string $label = null)
     * @method Grid\Column|Collection is_used(string $label = null)
     * @method Grid\Column|Collection re_expires_in(string $label = null)
     * @method Grid\Column|Collection refresh_token(string $label = null)
     * @method Grid\Column|Collection scope(string $label = null)
     * @method Grid\Column|Collection source(string $label = null)
     * @method Grid\Column|Collection change_address_time(string $label = null)
     * @method Grid\Column|Collection change_password_ip(string $label = null)
     * @method Grid\Column|Collection change_password_time(string $label = null)
     * @method Grid\Column|Collection last_ip(string $label = null)
     * @method Grid\Column|Collection last_login(string $label = null)
     * @method Grid\Column|Collection img_hold(string $label = null)
     * @method Grid\Column|Collection money_before_change(string $label = null)
     * @method Grid\Column|Collection sys_mid(string $label = null)
     * @method Grid\Column|Collection edit_to_phone(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection alipay_account(string $label = null)
     * @method Grid\Column|Collection alipay_avatar(string $label = null)
     * @method Grid\Column|Collection alipay_nickname(string $label = null)
     * @method Grid\Column|Collection balance_allowance(string $label = null)
     * @method Grid\Column|Collection balance_consume(string $label = null)
     * @method Grid\Column|Collection balance_tuan(string $label = null)
     * @method Grid\Column|Collection ban_reason(string $label = null)
     * @method Grid\Column|Collection birth(string $label = null)
     * @method Grid\Column|Collection business_integral(string $label = null)
     * @method Grid\Column|Collection business_lk(string $label = null)
     * @method Grid\Column|Collection code_invite(string $label = null)
     * @method Grid\Column|Collection invite_uid(string $label = null)
     * @method Grid\Column|Collection is_auth(string $label = null)
     * @method Grid\Column|Collection lk(string $label = null)
     * @method Grid\Column|Collection market_business(string $label = null)
     * @method Grid\Column|Collection member_head(string $label = null)
     * @method Grid\Column|Collection member_status(string $label = null)
     * @method Grid\Column|Collection real_name(string $label = null)
     * @method Grid\Column|Collection return_business_integral(string $label = null)
     * @method Grid\Column|Collection return_integral(string $label = null)
     * @method Grid\Column|Collection return_lk(string $label = null)
     * @method Grid\Column|Collection salt(string $label = null)
     * @method Grid\Column|Collection sex(string $label = null)
     * @method Grid\Column|Collection shop_uid(string $label = null)
     * @method Grid\Column|Collection sign(string $label = null)
     * @method Grid\Column|Collection expires_at(string $label = null)
     * @method Grid\Column|Collection used(string $label = null)
     * @method Grid\Column|Collection actual_amount(string $label = null)
     * @method Grid\Column|Collection alipay_status(string $label = null)
     * @method Grid\Column|Collection balance_fee(string $label = null)
     * @method Grid\Column|Collection balance_type(string $label = null)
     * @method Grid\Column|Collection failed_reason(string $label = null)
     * @method Grid\Column|Collection handling_price(string $label = null)
     * @method Grid\Column|Collection handling_ratio(string $label = null)
     * @method Grid\Column|Collection out_trade_no(string $label = null)
     * @method Grid\Column|Collection pay_fund_order_id(string $label = null)
     * @method Grid\Column|Collection trans_date(string $label = null)
     * @method Grid\Column|Collection fee(string $label = null)
     * @method Grid\Column|Collection action_type(string $label = null)
     * @method Grid\Column|Collection addtime(string $label = null)
     * @method Grid\Column|Collection admin_ip(string $label = null)
     * @method Grid\Column|Collection admin_name(string $label = null)
     * @method Grid\Column|Collection is_delete(string $label = null)
     * @method Grid\Column|Collection obj_id(string $label = null)
     * @method Grid\Column|Collection result(string $label = null)
     * @method Grid\Column|Collection route(string $label = null)
     * @method Grid\Column|Collection store_id(string $label = null)
     * @method Grid\Column|Collection create_time(string $label = null)
     * @method Grid\Column|Collection unit_id(string $label = null)
     * @method Grid\Column|Collection alibaba_json(string $label = null)
     * @method Grid\Column|Collection city_id(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection district_id(string $label = null)
     * @method Grid\Column|Collection is_default(string $label = null)
     * @method Grid\Column|Collection lat(string $label = null)
     * @method Grid\Column|Collection lng(string $label = null)
     * @method Grid\Column|Collection province_id(string $label = null)
     * @method Grid\Column|Collection app_max_count(string $label = null)
     * @method Grid\Column|Collection auth_key(string $label = null)
     * @method Grid\Column|Collection expire_time(string $label = null)
     * @method Grid\Column|Collection permission(string $label = null)
     * @method Grid\Column|Collection display_name(string $label = null)
     * @method Grid\Column|Collection desc(string $label = null)
     * @method Grid\Column|Collection alias_name(string $label = null)
     * @method Grid\Column|Collection alipay_logon_id(string $label = null)
     * @method Grid\Column|Collection binding_alipay_logon_id(string $label = null)
     * @method Grid\Column|Collection biz_cards(string $label = null)
     * @method Grid\Column|Collection business_address(string $label = null)
     * @method Grid\Column|Collection cert_image(string $label = null)
     * @method Grid\Column|Collection cert_image_back(string $label = null)
     * @method Grid\Column|Collection cert_name(string $label = null)
     * @method Grid\Column|Collection cert_no(string $label = null)
     * @method Grid\Column|Collection cert_type(string $label = null)
     * @method Grid\Column|Collection contact_infos(string $label = null)
     * @method Grid\Column|Collection default_settle_rule(string $label = null)
     * @method Grid\Column|Collection external_id(string $label = null)
     * @method Grid\Column|Collection invoice_info(string $label = null)
     * @method Grid\Column|Collection legal_cert_back_image(string $label = null)
     * @method Grid\Column|Collection legal_cert_front_image(string $label = null)
     * @method Grid\Column|Collection legal_cert_no(string $label = null)
     * @method Grid\Column|Collection legal_cert_type(string $label = null)
     * @method Grid\Column|Collection legal_name(string $label = null)
     * @method Grid\Column|Collection license_auth_letter_image(string $label = null)
     * @method Grid\Column|Collection mcc(string $label = null)
     * @method Grid\Column|Collection mch_id(string $label = null)
     * @method Grid\Column|Collection merchant_type(string $label = null)
     * @method Grid\Column|Collection out_door_images(string $label = null)
     * @method Grid\Column|Collection qualifications(string $label = null)
     * @method Grid\Column|Collection service(string $label = null)
     * @method Grid\Column|Collection service_phone(string $label = null)
     * @method Grid\Column|Collection sign_time_with_isv(string $label = null)
     * @method Grid\Column|Collection sites(string $label = null)
     * @method Grid\Column|Collection smid(string $label = null)
     * @method Grid\Column|Collection article_cat_id(string $label = null)
     * @method Grid\Column|Collection add_time(string $label = null)
     * @method Grid\Column|Collection is_bottom(string $label = null)
     * @method Grid\Column|Collection is_show(string $label = null)
     * @method Grid\Column|Collection attr_group_id(string $label = null)
     * @method Grid\Column|Collection attr_name(string $label = null)
     * @method Grid\Column|Collection attr_group_name(string $label = null)
     * @method Grid\Column|Collection creator_id(string $label = null)
     * @method Grid\Column|Collection permission_name(string $label = null)
     * @method Grid\Column|Collection open_type(string $label = null)
     * @method Grid\Column|Collection page_url(string $label = null)
     * @method Grid\Column|Collection pic_url(string $label = null)
     * @method Grid\Column|Collection skip_url(string $label = null)
     * @method Grid\Column|Collection begin_time(string $label = null)
     * @method Grid\Column|Collection goods_id(string $label = null)
     * @method Grid\Column|Collection min_price(string $label = null)
     * @method Grid\Column|Collection status_data(string $label = null)
     * @method Grid\Column|Collection attr(string $label = null)
     * @method Grid\Column|Collection original_price(string $label = null)
     * @method Grid\Column|Collection is_mail(string $label = null)
     * @method Grid\Column|Collection is_print(string $label = null)
     * @method Grid\Column|Collection is_share(string $label = null)
     * @method Grid\Column|Collection is_sms(string $label = null)
     * @method Grid\Column|Collection share_title(string $label = null)
     * @method Grid\Column|Collection initials(string $label = null)
     * @method Grid\Column|Collection pinyin(string $label = null)
     * @method Grid\Column|Collection parts_id(string $label = null)
     * @method Grid\Column|Collection bank_name(string $label = null)
     * @method Grid\Column|Collection pay_type(string $label = null)
     * @method Grid\Column|Collection service_charge(string $label = null)
     * @method Grid\Column|Collection advert_pic(string $label = null)
     * @method Grid\Column|Collection advert_url(string $label = null)
     * @method Grid\Column|Collection big_pic_url(string $label = null)
     * @method Grid\Column|Collection pc_advert_url(string $label = null)
     * @method Grid\Column|Collection pc_icon(string $label = null)
     * @method Grid\Column|Collection seo_desc(string $label = null)
     * @method Grid\Column|Collection seo_keyword(string $label = null)
     * @method Grid\Column|Collection subtitle(string $label = null)
     * @method Grid\Column|Collection color(string $label = null)
     * @method Grid\Column|Collection rgb(string $label = null)
     * @method Grid\Column|Collection is_expire(string $label = null)
     * @method Grid\Column|Collection key_val(string $label = null)
     * @method Grid\Column|Collection sur_price(string $label = null)
     * @method Grid\Column|Collection total_price(string $label = null)
     * @method Grid\Column|Collection vd_id(string $label = null)
     * @method Grid\Column|Collection vl_id(string $label = null)
     * @method Grid\Column|Collection appoint_type(string $label = null)
     * @method Grid\Column|Collection cat_id_list(string $label = null)
     * @method Grid\Column|Collection discount(string $label = null)
     * @method Grid\Column|Collection discount_type(string $label = null)
     * @method Grid\Column|Collection expire_day(string $label = null)
     * @method Grid\Column|Collection expire_type(string $label = null)
     * @method Grid\Column|Collection goods_id_list(string $label = null)
     * @method Grid\Column|Collection is_integral(string $label = null)
     * @method Grid\Column|Collection is_join(string $label = null)
     * @method Grid\Column|Collection rule(string $label = null)
     * @method Grid\Column|Collection sub_price(string $label = null)
     * @method Grid\Column|Collection total_count(string $label = null)
     * @method Grid\Column|Collection user_num(string $label = null)
     * @method Grid\Column|Collection coupon_id(string $label = null)
     * @method Grid\Column|Collection event(string $label = null)
     * @method Grid\Column|Collection send_times(string $label = null)
     * @method Grid\Column|Collection customer_pwd(string $label = null)
     * @method Grid\Column|Collection express_id(string $label = null)
     * @method Grid\Column|Collection month_code(string $label = null)
     * @method Grid\Column|Collection send_name(string $label = null)
     * @method Grid\Column|Collection send_site(string $label = null)
     * @method Grid\Column|Collection template_size(string $label = null)
     * @method Grid\Column|Collection adverse_distribution(string $label = null)
     * @method Grid\Column|Collection adverse_kilometres(string $label = null)
     * @method Grid\Column|Collection adverse_lat_and_lon(string $label = null)
     * @method Grid\Column|Collection adverse_money(string $label = null)
     * @method Grid\Column|Collection lat_and_lon(string $label = null)
     * @method Grid\Column|Collection order_time(string $label = null)
     * @method Grid\Column|Collection routine_distribution(string $label = null)
     * @method Grid\Column|Collection routine_kilometres(string $label = null)
     * @method Grid\Column|Collection routine_money(string $label = null)
     * @method Grid\Column|Collection adcode(string $label = null)
     * @method Grid\Column|Collection citycode(string $label = null)
     * @method Grid\Column|Collection level(string $label = null)
     * @method Grid\Column|Collection is_index(string $label = null)
     * @method Grid\Column|Collection template_id(string $label = null)
     * @method Grid\Column|Collection template(string $label = null)
     * @method Grid\Column|Collection default(string $label = null)
     * @method Grid\Column|Collection required(string $label = null)
     * @method Grid\Column|Collection tip(string $label = null)
     * @method Grid\Column|Collection form_id(string $label = null)
     * @method Grid\Column|Collection is_usable(string $label = null)
     * @method Grid\Column|Collection send_count(string $label = null)
     * @method Grid\Column|Collection transaction_id(string $label = null)
     * @method Grid\Column|Collection wechat_open_id(string $label = null)
     * @method Grid\Column|Collection coupon_expire(string $label = null)
     * @method Grid\Column|Collection coupon_money(string $label = null)
     * @method Grid\Column|Collection coupon_total_money(string $label = null)
     * @method Grid\Column|Collection coupon_use_minimum(string $label = null)
     * @method Grid\Column|Collection distribute_type(string $label = null)
     * @method Grid\Column|Collection is_finish(string $label = null)
     * @method Grid\Column|Collection game_open(string $label = null)
     * @method Grid\Column|Collection game_time(string $label = null)
     * @method Grid\Column|Collection share_pic(string $label = null)
     * @method Grid\Column|Collection tpl_msg_id(string $label = null)
     * @method Grid\Column|Collection after_sales_id(string $label = null)
     * @method Grid\Column|Collection attr_setting_type(string $label = null)
     * @method Grid\Column|Collection auto_send(string $label = null)
     * @method Grid\Column|Collection auto_vr_cont(string $label = null)
     * @method Grid\Column|Collection brand_id(string $label = null)
     * @method Grid\Column|Collection card_data(string $label = null)
     * @method Grid\Column|Collection confine_count(string $label = null)
     * @method Grid\Column|Collection cost_price(string $label = null)
     * @method Grid\Column|Collection cover_pic(string $label = null)
     * @method Grid\Column|Collection freight(string $label = null)
     * @method Grid\Column|Collection full_cut(string $label = null)
     * @method Grid\Column|Collection goods_num(string $label = null)
     * @method Grid\Column|Collection hot_cakes(string $label = null)
     * @method Grid\Column|Collection individual_share(string $label = null)
     * @method Grid\Column|Collection is_best(string $label = null)
     * @method Grid\Column|Collection is_examine(string $label = null)
     * @method Grid\Column|Collection is_hot(string $label = null)
     * @method Grid\Column|Collection is_lead(string $label = null)
     * @method Grid\Column|Collection is_level(string $label = null)
     * @method Grid\Column|Collection is_negotiable(string $label = null)
     * @method Grid\Column|Collection is_recycle(string $label = null)
     * @method Grid\Column|Collection is_spell(string $label = null)
     * @method Grid\Column|Collection isSelf(string $label = null)
     * @method Grid\Column|Collection label_id(string $label = null)
     * @method Grid\Column|Collection lead_attr(string $label = null)
     * @method Grid\Column|Collection lead_price(string $label = null)
     * @method Grid\Column|Collection lead_type(string $label = null)
     * @method Grid\Column|Collection market_increase(string $label = null)
     * @method Grid\Column|Collection mch_is_best(string $label = null)
     * @method Grid\Column|Collection mch_is_hot(string $label = null)
     * @method Grid\Column|Collection mch_ratio(string $label = null)
     * @method Grid\Column|Collection mch_sort(string $label = null)
     * @method Grid\Column|Collection member_discount(string $label = null)
     * @method Grid\Column|Collection osg_id(string $label = null)
     * @method Grid\Column|Collection packing_id(string $label = null)
     * @method Grid\Column|Collection payment(string $label = null)
     * @method Grid\Column|Collection platform_ratio(string $label = null)
     * @method Grid\Column|Collection price_increase(string $label = null)
     * @method Grid\Column|Collection purchase_price(string $label = null)
     * @method Grid\Column|Collection quick_purchase(string $label = null)
     * @method Grid\Column|Collection rebate(string $label = null)
     * @method Grid\Column|Collection share_commission_first(string $label = null)
     * @method Grid\Column|Collection share_commission_second(string $label = null)
     * @method Grid\Column|Collection share_commission_third(string $label = null)
     * @method Grid\Column|Collection share_type(string $label = null)
     * @method Grid\Column|Collection supplierLoginId(string $label = null)
     * @method Grid\Column|Collection unit(string $label = null)
     * @method Grid\Column|Collection use_attr(string $label = null)
     * @method Grid\Column|Collection video_url(string $label = null)
     * @method Grid\Column|Collection virtual_sales(string $label = null)
     * @method Grid\Column|Collection vop_id(string $label = null)
     * @method Grid\Column|Collection vr_type(string $label = null)
     * @method Grid\Column|Collection wareQD(string $label = null)
     * @method Grid\Column|Collection wares_id(string $label = null)
     * @method Grid\Column|Collection wares_status(string $label = null)
     * @method Grid\Column|Collection weight(string $label = null)
     * @method Grid\Column|Collection click(string $label = null)
     * @method Grid\Column|Collection card_id(string $label = null)
     * @method Grid\Column|Collection goods_parts_id(string $label = null)
     * @method Grid\Column|Collection relation_id(string $label = null)
     * @method Grid\Column|Collection good_id(string $label = null)
     * @method Grid\Column|Collection like_id(string $label = null)
     * @method Grid\Column|Collection style(string $label = null)
     * @method Grid\Column|Collection is_hide(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection is_virtual(string $label = null)
     * @method Grid\Column|Collection order_detail_id(string $label = null)
     * @method Grid\Column|Collection pic_list(string $label = null)
     * @method Grid\Column|Collection reply_content(string $label = null)
     * @method Grid\Column|Collection score(string $label = null)
     * @method Grid\Column|Collection score_star(string $label = null)
     * @method Grid\Column|Collection virtual_avatar(string $label = null)
     * @method Grid\Column|Collection virtual_user(string $label = null)
     * @method Grid\Column|Collection is_pay(string $label = null)
     * @method Grid\Column|Collection goods_pic_list(string $label = null)
     * @method Grid\Column|Collection explain(string $label = null)
     * @method Grid\Column|Collection operator(string $label = null)
     * @method Grid\Column|Collection operator_id(string $label = null)
     * @method Grid\Column|Collection address_data(string $label = null)
     * @method Grid\Column|Collection apply_delete(string $label = null)
     * @method Grid\Column|Collection clerk_id(string $label = null)
     * @method Grid\Column|Collection confirm_time(string $label = null)
     * @method Grid\Column|Collection express(string $label = null)
     * @method Grid\Column|Collection express_no(string $label = null)
     * @method Grid\Column|Collection express_price(string $label = null)
     * @method Grid\Column|Collection is_cancel(string $label = null)
     * @method Grid\Column|Collection is_comment(string $label = null)
     * @method Grid\Column|Collection is_offline(string $label = null)
     * @method Grid\Column|Collection is_sale(string $label = null)
     * @method Grid\Column|Collection is_send(string $label = null)
     * @method Grid\Column|Collection offline_qrcode(string $label = null)
     * @method Grid\Column|Collection pay_price(string $label = null)
     * @method Grid\Column|Collection send_time(string $label = null)
     * @method Grid\Column|Collection shop_id(string $label = null)
     * @method Grid\Column|Collection words(string $label = null)
     * @method Grid\Column|Collection goods_name(string $label = null)
     * @method Grid\Column|Collection pay_integral(string $label = null)
     * @method Grid\Column|Collection pic(string $label = null)
     * @method Grid\Column|Collection integral_shuoming(string $label = null)
     * @method Grid\Column|Collection register_continuation(string $label = null)
     * @method Grid\Column|Collection register_integral(string $label = null)
     * @method Grid\Column|Collection register_reward(string $label = null)
     * @method Grid\Column|Collection register_rule(string $label = null)
     * @method Grid\Column|Collection taxpayer(string $label = null)
     * @method Grid\Column|Collection totalprice(string $label = null)
     * @method Grid\Column|Collection skuId(string $label = null)
     * @method Grid\Column|Collection cn_name(string $label = null)
     * @method Grid\Column|Collection en_name(string $label = null)
     * @method Grid\Column|Collection cat_num(string $label = null)
     * @method Grid\Column|Collection categoryAttr(string $label = null)
     * @method Grid\Column|Collection param(string $label = null)
     * @method Grid\Column|Collection saleAttr(string $label = null)
     * @method Grid\Column|Collection attr_json(string $label = null)
     * @method Grid\Column|Collection cat_attr_id(string $label = null)
     * @method Grid\Column|Collection cat_name(string $label = null)
     * @method Grid\Column|Collection goods_no(string $label = null)
     * @method Grid\Column|Collection is_upsert(string $label = null)
     * @method Grid\Column|Collection isEnergySav(string $label = null)
     * @method Grid\Column|Collection isEnvironmental(string $label = null)
     * @method Grid\Column|Collection packing_list(string $label = null)
     * @method Grid\Column|Collection taxCode(string $label = null)
     * @method Grid\Column|Collection taxInfo(string $label = null)
     * @method Grid\Column|Collection addTime(string $label = null)
     * @method Grid\Column|Collection thirdSkuId(string $label = null)
     * @method Grid\Column|Collection typeMsg(string $label = null)
     * @method Grid\Column|Collection cancel_status(string $label = null)
     * @method Grid\Column|Collection cityId(string $label = null)
     * @method Grid\Column|Collection countyId(string $label = null)
     * @method Grid\Column|Collection invoiceState(string $label = null)
     * @method Grid\Column|Collection is_true(string $label = null)
     * @method Grid\Column|Collection jjys_order_no(string $label = null)
     * @method Grid\Column|Collection provinceId(string $label = null)
     * @method Grid\Column|Collection submitStatus(string $label = null)
     * @method Grid\Column|Collection townId(string $label = null)
     * @method Grid\Column|Collection zip(string $label = null)
     * @method Grid\Column|Collection jjys_url(string $label = null)
     * @method Grid\Column|Collection purch_appkey(string $label = null)
     * @method Grid\Column|Collection purch_appsecret(string $label = null)
     * @method Grid\Column|Collection purch_suppliercode(string $label = null)
     * @method Grid\Column|Collection supplier_appid(string $label = null)
     * @method Grid\Column|Collection supplier_appkey(string $label = null)
     * @method Grid\Column|Collection supplier_appsecret(string $label = null)
     * @method Grid\Column|Collection buy_prompt(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection level_image(string $label = null)
     * @method Grid\Column|Collection synopsis(string $label = null)
     * @method Grid\Column|Collection after_level(string $label = null)
     * @method Grid\Column|Collection current_level(string $label = null)
     * @method Grid\Column|Collection icon_url(string $label = null)
     * @method Grid\Column|Collection actype(string $label = null)
     * @method Grid\Column|Collection describe(string $label = null)
     * @method Grid\Column|Collection follow_num(string $label = null)
     * @method Grid\Column|Collection front_img(string $label = null)
     * @method Grid\Column|Collection head_img(string $label = null)
     * @method Grid\Column|Collection idcard(string $label = null)
     * @method Grid\Column|Collection is_recom(string $label = null)
     * @method Grid\Column|Collection live_power(string $label = null)
     * @method Grid\Column|Collection live_price(string $label = null)
     * @method Grid\Column|Collection max_goods(string $label = null)
     * @method Grid\Column|Collection nickname(string $label = null)
     * @method Grid\Column|Collection real_tel(string $label = null)
     * @method Grid\Column|Collection rect_time(string $label = null)
     * @method Grid\Column|Collection refuse_desc(string $label = null)
     * @method Grid\Column|Collection anchor_id(string $label = null)
     * @method Grid\Column|Collection refund_desc(string $label = null)
     * @method Grid\Column|Collection unumber(string $label = null)
     * @method Grid\Column|Collection goods_type(string $label = null)
     * @method Grid\Column|Collection back_img(string $label = null)
     * @method Grid\Column|Collection comment_num(string $label = null)
     * @method Grid\Column|Collection cover_img(string $label = null)
     * @method Grid\Column|Collection endtime(string $label = null)
     * @method Grid\Column|Collection fict_like(string $label = null)
     * @method Grid\Column|Collection fict_watch(string $label = null)
     * @method Grid\Column|Collection get_past(string $label = null)
     * @method Grid\Column|Collection like_num(string $label = null)
     * @method Grid\Column|Collection play_addr(string $label = null)
     * @method Grid\Column|Collection push_addr(string $label = null)
     * @method Grid\Column|Collection real_endtime(string $label = null)
     * @method Grid\Column|Collection real_starttime(string $label = null)
     * @method Grid\Column|Collection sale_goods(string $label = null)
     * @method Grid\Column|Collection starttime(string $label = null)
     * @method Grid\Column|Collection un_key(string $label = null)
     * @method Grid\Column|Collection watch_num(string $label = null)
     * @method Grid\Column|Collection cs_drawing(string $label = null)
     * @method Grid\Column|Collection cs_overtime(string $label = null)
     * @method Grid\Column|Collection cs_setting(string $label = null)
     * @method Grid\Column|Collection cs_tips(string $label = null)
     * @method Grid\Column|Collection cs_type(string $label = null)
     * @method Grid\Column|Collection least_money(string $label = null)
     * @method Grid\Column|Collection money_comm(string $label = null)
     * @method Grid\Column|Collection upper_money(string $label = null)
     * @method Grid\Column|Collection stock(string $label = null)
     * @method Grid\Column|Collection update_time(string $label = null)
     * @method Grid\Column|Collection child_id(string $label = null)
     * @method Grid\Column|Collection lottery_id(string $label = null)
     * @method Grid\Column|Collection lucky_code(string $label = null)
     * @method Grid\Column|Collection obtain_time(string $label = null)
     * @method Grid\Column|Collection raffle_time(string $label = null)
     * @method Grid\Column|Collection receive_mail(string $label = null)
     * @method Grid\Column|Collection send_mail(string $label = null)
     * @method Grid\Column|Collection send_pwd(string $label = null)
     * @method Grid\Column|Collection account_money(string $label = null)
     * @method Grid\Column|Collection account_type(string $label = null)
     * @method Grid\Column|Collection alipay_account_name(string $label = null)
     * @method Grid\Column|Collection choice_invoice(string $label = null)
     * @method Grid\Column|Collection collection_app_key(string $label = null)
     * @method Grid\Column|Collection fictitious_follow(string $label = null)
     * @method Grid\Column|Collection header_bg(string $label = null)
     * @method Grid\Column|Collection is_invoice(string $label = null)
     * @method Grid\Column|Collection is_lock(string $label = null)
     * @method Grid\Column|Collection is_open(string $label = null)
     * @method Grid\Column|Collection is_popular(string $label = null)
     * @method Grid\Column|Collection latitude(string $label = null)
     * @method Grid\Column|Collection logo(string $label = null)
     * @method Grid\Column|Collection longitude(string $label = null)
     * @method Grid\Column|Collection main_content(string $label = null)
     * @method Grid\Column|Collection mch_common_cat_id(string $label = null)
     * @method Grid\Column|Collection mch_message(string $label = null)
     * @method Grid\Column|Collection mch_money(string $label = null)
     * @method Grid\Column|Collection mch_money_status(string $label = null)
     * @method Grid\Column|Collection mch_type(string $label = null)
     * @method Grid\Column|Collection o2o_cat_id(string $label = null)
     * @method Grid\Column|Collection realname(string $label = null)
     * @method Grid\Column|Collection review_result(string $label = null)
     * @method Grid\Column|Collection review_status(string $label = null)
     * @method Grid\Column|Collection review_time(string $label = null)
     * @method Grid\Column|Collection service_tel(string $label = null)
     * @method Grid\Column|Collection summary(string $label = null)
     * @method Grid\Column|Collection tel(string $label = null)
     * @method Grid\Column|Collection transfer_rate(string $label = null)
     * @method Grid\Column|Collection wechat_name(string $label = null)
     * @method Grid\Column|Collection wx_account_name(string $label = null)
     * @method Grid\Column|Collection rate_data(string $label = null)
     * @method Grid\Column|Collection type_data(string $label = null)
     * @method Grid\Column|Collection virtual_type(string $label = null)
     * @method Grid\Column|Collection ctr_type(string $label = null)
     * @method Grid\Column|Collection edittime(string $label = null)
     * @method Grid\Column|Collection audit_notes(string $label = null)
     * @method Grid\Column|Collection audit_time(string $label = null)
     * @method Grid\Column|Collection ctr_id(string $label = null)
     * @method Grid\Column|Collection is_agree(string $label = null)
     * @method Grid\Column|Collection ms_id(string $label = null)
     * @method Grid\Column|Collection top_time(string $label = null)
     * @method Grid\Column|Collection group(string $label = null)
     * @method Grid\Column|Collection is_read(string $label = null)
     * @method Grid\Column|Collection is_sound(string $label = null)
     * @method Grid\Column|Collection is_enable(string $label = null)
     * @method Grid\Column|Collection visit_date(string $label = null)
     * @method Grid\Column|Collection open_time(string $label = null)
     * @method Grid\Column|Collection buy_limit(string $label = null)
     * @method Grid\Column|Collection buy_max(string $label = null)
     * @method Grid\Column|Collection open_date(string $label = null)
     * @method Grid\Column|Collection coupon(string $label = null)
     * @method Grid\Column|Collection is_discount(string $label = null)
     * @method Grid\Column|Collection sales(string $label = null)
     * @method Grid\Column|Collection before_update_express(string $label = null)
     * @method Grid\Column|Collection before_update_price(string $label = null)
     * @method Grid\Column|Collection coupon_sub_price(string $label = null)
     * @method Grid\Column|Collection express_price_1(string $label = null)
     * @method Grid\Column|Collection first_price(string $label = null)
     * @method Grid\Column|Collection give_integral(string $label = null)
     * @method Grid\Column|Collection integral_amount(string $label = null)
     * @method Grid\Column|Collection is_partner(string $label = null)
     * @method Grid\Column|Collection is_price(string $label = null)
     * @method Grid\Column|Collection is_revoke(string $label = null)
     * @method Grid\Column|Collection is_sum(string $label = null)
     * @method Grid\Column|Collection is_transfer(string $label = null)
     * @method Grid\Column|Collection limit_time(string $label = null)
     * @method Grid\Column|Collection order_source(string $label = null)
     * @method Grid\Column|Collection parent_id_1(string $label = null)
     * @method Grid\Column|Collection parent_id_2(string $label = null)
     * @method Grid\Column|Collection second_price(string $label = null)
     * @method Grid\Column|Collection seller_comments(string $label = null)
     * @method Grid\Column|Collection share_price(string $label = null)
     * @method Grid\Column|Collection third_price(string $label = null)
     * @method Grid\Column|Collection user_coupon_id(string $label = null)
     * @method Grid\Column|Collection mch_describe(string $label = null)
     * @method Grid\Column|Collection mch_logistics(string $label = null)
     * @method Grid\Column|Collection mch_service(string $label = null)
     * @method Grid\Column|Collection address_id(string $label = null)
     * @method Grid\Column|Collection is_return(string $label = null)
     * @method Grid\Column|Collection is_user_send(string $label = null)
     * @method Grid\Column|Collection order_refund_no(string $label = null)
     * @method Grid\Column|Collection refund_price(string $label = null)
     * @method Grid\Column|Collection response_time(string $label = null)
     * @method Grid\Column|Collection return_express(string $label = null)
     * @method Grid\Column|Collection return_express_no(string $label = null)
     * @method Grid\Column|Collection user_send_express(string $label = null)
     * @method Grid\Column|Collection user_send_express_no(string $label = null)
     * @method Grid\Column|Collection is_area(string $label = null)
     * @method Grid\Column|Collection unpaid(string $label = null)
     * @method Grid\Column|Collection appeal_img(string $label = null)
     * @method Grid\Column|Collection appeal_status(string $label = null)
     * @method Grid\Column|Collection appeal_text(string $label = null)
     * @method Grid\Column|Collection appeal_type(string $label = null)
     * @method Grid\Column|Collection comment_id(string $label = null)
     * @method Grid\Column|Collection is_appeal(string $label = null)
     * @method Grid\Column|Collection coupon_amount(string $label = null)
     * @method Grid\Column|Collection coupon_name(string $label = null)
     * @method Grid\Column|Collection coupon_stock(string $label = null)
     * @method Grid\Column|Collection coupon_type(string $label = null)
     * @method Grid\Column|Collection period_validity(string $label = null)
     * @method Grid\Column|Collection restriction_type(string $label = null)
     * @method Grid\Column|Collection times_collection(string $label = null)
     * @method Grid\Column|Collection use_threshold(string $label = null)
     * @method Grid\Column|Collection full_reduction(string $label = null)
     * @method Grid\Column|Collection cancel_type(string $label = null)
     * @method Grid\Column|Collection express_rider(string $label = null)
     * @method Grid\Column|Collection express_tel(string $label = null)
     * @method Grid\Column|Collection full_price(string $label = null)
     * @method Grid\Column|Collection invoice_id(string $label = null)
     * @method Grid\Column|Collection invoice_type(string $label = null)
     * @method Grid\Column|Collection is_full(string $label = null)
     * @method Grid\Column|Collection is_overtime(string $label = null)
     * @method Grid\Column|Collection is_reply(string $label = null)
     * @method Grid\Column|Collection is_reservation(string $label = null)
     * @method Grid\Column|Collection order_status(string $label = null)
     * @method Grid\Column|Collection reply_time(string $label = null)
     * @method Grid\Column|Collection reservation_time(string $label = null)
     * @method Grid\Column|Collection packing_fee(string $label = null)
     * @method Grid\Column|Collection reality_price(string $label = null)
     * @method Grid\Column|Collection dada_api_url(string $label = null)
     * @method Grid\Column|Collection dada_id(string $label = null)
     * @method Grid\Column|Collection dada_key(string $label = null)
     * @method Grid\Column|Collection dada_secret(string $label = null)
     * @method Grid\Column|Collection dada_shop_id(string $label = null)
     * @method Grid\Column|Collection delivery_method(string $label = null)
     * @method Grid\Column|Collection end_hours(string $label = null)
     * @method Grid\Column|Collection fengniao_api_url(string $label = null)
     * @method Grid\Column|Collection fengniao_id(string $label = null)
     * @method Grid\Column|Collection fengniao_key(string $label = null)
     * @method Grid\Column|Collection is_bad_weather(string $label = null)
     * @method Grid\Column|Collection is_dial(string $label = null)
     * @method Grid\Column|Collection is_evaluate(string $label = null)
     * @method Grid\Column|Collection is_self_mention(string $label = null)
     * @method Grid\Column|Collection meituan_api_url(string $label = null)
     * @method Grid\Column|Collection meituan_id(string $label = null)
     * @method Grid\Column|Collection meituan_key(string $label = null)
     * @method Grid\Column|Collection shansong_api_url(string $label = null)
     * @method Grid\Column|Collection shansong_id(string $label = null)
     * @method Grid\Column|Collection shansong_key(string $label = null)
     * @method Grid\Column|Collection shop_notices(string $label = null)
     * @method Grid\Column|Collection start_hours(string $label = null)
     * @method Grid\Column|Collection virtual_delivery_time(string $label = null)
     * @method Grid\Column|Collection ali_is_pay(string $label = null)
     * @method Grid\Column|Collection ali_order_no(string $label = null)
     * @method Grid\Column|Collection ali_refund(string $label = null)
     * @method Grid\Column|Collection ali_sum_price(string $label = null)
     * @method Grid\Column|Collection consumer_id(string $label = null)
     * @method Grid\Column|Collection consumer_price(string $label = null)
     * @method Grid\Column|Collection currency(string $label = null)
     * @method Grid\Column|Collection is_balance(string $label = null)
     * @method Grid\Column|Collection is_live(string $label = null)
     * @method Grid\Column|Collection is_live_price(string $label = null)
     * @method Grid\Column|Collection is_quick(string $label = null)
     * @method Grid\Column|Collection jdvop_is_invoice(string $label = null)
     * @method Grid\Column|Collection jdvop_is_pay(string $label = null)
     * @method Grid\Column|Collection jdvop_order_no(string $label = null)
     * @method Grid\Column|Collection jdvop_refund(string $label = null)
     * @method Grid\Column|Collection jdvop_sum_price(string $label = null)
     * @method Grid\Column|Collection live_id(string $label = null)
     * @method Grid\Column|Collection order_union_id(string $label = null)
     * @method Grid\Column|Collection send_email(string $label = null)
     * @method Grid\Column|Collection user_dedu_balance(string $label = null)
     * @method Grid\Column|Collection consumer_card_id(string $label = null)
     * @method Grid\Column|Collection is_exchange(string $label = null)
     * @method Grid\Column|Collection ordedr_sn(string $label = null)
     * @method Grid\Column|Collection ali_unit_price(string $label = null)
     * @method Grid\Column|Collection parts_price(string $label = null)
     * @method Grid\Column|Collection vr_data_id(string $label = null)
     * @method Grid\Column|Collection vr_list_id(string $label = null)
     * @method Grid\Column|Collection EBusinessID(string $label = null)
     * @method Grid\Column|Collection express_code(string $label = null)
     * @method Grid\Column|Collection printTeplate(string $label = null)
     * @method Grid\Column|Collection ali_json(string $label = null)
     * @method Grid\Column|Collection ali_refund_Id(string $label = null)
     * @method Grid\Column|Collection parent_id_3(string $label = null)
     * @method Grid\Column|Collection order_id_list(string $label = null)
     * @method Grid\Column|Collection diff_money(string $label = null)
     * @method Grid\Column|Collection finish(string $label = null)
     * @method Grid\Column|Collection info(string $label = null)
     * @method Grid\Column|Collection out_order_no(string $label = null)
     * @method Grid\Column|Collection sub_mchid(string $label = null)
     * @method Grid\Column|Collection bank_memo(string $label = null)
     * @method Grid\Column|Collection out_request_no(string $label = null)
     * @method Grid\Column|Collection withdraw_id(string $label = null)
     * @method Grid\Column|Collection gift_id(string $label = null)
     * @method Grid\Column|Collection image_url(string $label = null)
     * @method Grid\Column|Collection orderby(string $label = null)
     * @method Grid\Column|Collection pond_id(string $label = null)
     * @method Grid\Column|Collection deplete_register(string $label = null)
     * @method Grid\Column|Collection oppty(string $label = null)
     * @method Grid\Column|Collection probability(string $label = null)
     * @method Grid\Column|Collection printer_setting(string $label = null)
     * @method Grid\Column|Collection printer_type(string $label = null)
     * @method Grid\Column|Collection big(string $label = null)
     * @method Grid\Column|Collection block_id(string $label = null)
     * @method Grid\Column|Collection is_attr(string $label = null)
     * @method Grid\Column|Collection printer_id(string $label = null)
     * @method Grid\Column|Collection colonel(string $label = null)
     * @method Grid\Column|Collection group_num(string $label = null)
     * @method Grid\Column|Collection grouptime(string $label = null)
     * @method Grid\Column|Collection is_more(string $label = null)
     * @method Grid\Column|Collection is_only(string $label = null)
     * @method Grid\Column|Collection one_buy_limit(string $label = null)
     * @method Grid\Column|Collection group_time(string $label = null)
     * @method Grid\Column|Collection class_group(string $label = null)
     * @method Grid\Column|Collection is_group(string $label = null)
     * @method Grid\Column|Collection is_returnd(string $label = null)
     * @method Grid\Column|Collection is_success(string $label = null)
     * @method Grid\Column|Collection offline(string $label = null)
     * @method Grid\Column|Collection success_time(string $label = null)
     * @method Grid\Column|Collection avatar_position(string $label = null)
     * @method Grid\Column|Collection avatar_size(string $label = null)
     * @method Grid\Column|Collection font(string $label = null)
     * @method Grid\Column|Collection font_position(string $label = null)
     * @method Grid\Column|Collection preview(string $label = null)
     * @method Grid\Column|Collection qrcode_bg(string $label = null)
     * @method Grid\Column|Collection qrcode_position(string $label = null)
     * @method Grid\Column|Collection qrcode_size(string $label = null)
     * @method Grid\Column|Collection send_price(string $label = null)
     * @method Grid\Column|Collection continuation(string $label = null)
     * @method Grid\Column|Collection register_time(string $label = null)
     * @method Grid\Column|Collection account_info(string $label = null)
     * @method Grid\Column|Collection applyment_id(string $label = null)
     * @method Grid\Column|Collection business_addition_desc(string $label = null)
     * @method Grid\Column|Collection business_addition_pics(string $label = null)
     * @method Grid\Column|Collection business_license_info(string $label = null)
     * @method Grid\Column|Collection contact_info(string $label = null)
     * @method Grid\Column|Collection id_card_info(string $label = null)
     * @method Grid\Column|Collection id_doc_info(string $label = null)
     * @method Grid\Column|Collection id_doc_type(string $label = null)
     * @method Grid\Column|Collection merchant_shortname(string $label = null)
     * @method Grid\Column|Collection need_account_info(string $label = null)
     * @method Grid\Column|Collection organization_cert_info(string $label = null)
     * @method Grid\Column|Collection organization_type(string $label = null)
     * @method Grid\Column|Collection sales_scene_info(string $label = null)
     * @method Grid\Column|Collection company(string $label = null)
     * @method Grid\Column|Collection delivery_id(string $label = null)
     * @method Grid\Column|Collection exp_area(string $label = null)
     * @method Grid\Column|Collection post_code(string $label = null)
     * @method Grid\Column|Collection expire(string $label = null)
     * @method Grid\Column|Collection agree(string $label = null)
     * @method Grid\Column|Collection auto_share_val(string $label = null)
     * @method Grid\Column|Collection bank(string $label = null)
     * @method Grid\Column|Collection condition(string $label = null)
     * @method Grid\Column|Collection first(string $label = null)
     * @method Grid\Column|Collection first_name(string $label = null)
     * @method Grid\Column|Collection is_rebate(string $label = null)
     * @method Grid\Column|Collection min_money(string $label = null)
     * @method Grid\Column|Collection pic_url_1(string $label = null)
     * @method Grid\Column|Collection pic_url_2(string $label = null)
     * @method Grid\Column|Collection price_type(string $label = null)
     * @method Grid\Column|Collection remaining_sum(string $label = null)
     * @method Grid\Column|Collection second_name(string $label = null)
     * @method Grid\Column|Collection share_condition(string $label = null)
     * @method Grid\Column|Collection share_good_id(string $label = null)
     * @method Grid\Column|Collection share_good_status(string $label = null)
     * @method Grid\Column|Collection third(string $label = null)
     * @method Grid\Column|Collection third_name(string $label = null)
     * @method Grid\Column|Collection cover_url(string $label = null)
     * @method Grid\Column|Collection shop_time(string $label = null)
     * @method Grid\Column|Collection fictitious_collection(string $label = null)
     * @method Grid\Column|Collection fictitious_forward(string $label = null)
     * @method Grid\Column|Collection fictitious_give(string $label = null)
     * @method Grid\Column|Collection fictitious_play(string $label = null)
     * @method Grid\Column|Collection short_video_id(string $label = null)
     * @method Grid\Column|Collection tpl(string $label = null)
     * @method Grid\Column|Collection AccessKeyId(string $label = null)
     * @method Grid\Column|Collection AccessKeySecret(string $label = null)
     * @method Grid\Column|Collection tpl_code(string $label = null)
     * @method Grid\Column|Collection tpl_refund(string $label = null)
     * @method Grid\Column|Collection next_full(string $label = null)
     * @method Grid\Column|Collection next_reduce(string $label = null)
     * @method Grid\Column|Collection reduce(string $label = null)
     * @method Grid\Column|Collection spell_id(string $label = null)
     * @method Grid\Column|Collection full(string $label = null)
     * @method Grid\Column|Collection effective_time(string $label = null)
     * @method Grid\Column|Collection bail_currency(string $label = null)
     * @method Grid\Column|Collection step_num(string $label = null)
     * @method Grid\Column|Collection step_currency(string $label = null)
     * @method Grid\Column|Collection step_id(string $label = null)
     * @method Grid\Column|Collection type_id(string $label = null)
     * @method Grid\Column|Collection activity_rule(string $label = null)
     * @method Grid\Column|Collection convert_max(string $label = null)
     * @method Grid\Column|Collection convert_ratio(string $label = null)
     * @method Grid\Column|Collection invite_ratio(string $label = null)
     * @method Grid\Column|Collection qrcode_title(string $label = null)
     * @method Grid\Column|Collection ranking_num(string $label = null)
     * @method Grid\Column|Collection remind_time(string $label = null)
     * @method Grid\Column|Collection ratio(string $label = null)
     * @method Grid\Column|Collection remind(string $label = null)
     * @method Grid\Column|Collection acid(string $label = null)
     * @method Grid\Column|Collection after_sale_time(string $label = null)
     * @method Grid\Column|Collection buy_member(string $label = null)
     * @method Grid\Column|Collection cat_goods_cols(string $label = null)
     * @method Grid\Column|Collection cat_goods_count(string $label = null)
     * @method Grid\Column|Collection cat_style(string $label = null)
     * @method Grid\Column|Collection copyright(string $label = null)
     * @method Grid\Column|Collection copyright_pic_url(string $label = null)
     * @method Grid\Column|Collection copyright_url(string $label = null)
     * @method Grid\Column|Collection cut_thread(string $label = null)
     * @method Grid\Column|Collection delivery_time(string $label = null)
     * @method Grid\Column|Collection dial(string $label = null)
     * @method Grid\Column|Collection dial_pic(string $label = null)
     * @method Grid\Column|Collection good_negotiable(string $label = null)
     * @method Grid\Column|Collection home_page_module(string $label = null)
     * @method Grid\Column|Collection integration(string $label = null)
     * @method Grid\Column|Collection is_coupon(string $label = null)
     * @method Grid\Column|Collection is_member(string $label = null)
     * @method Grid\Column|Collection is_member_price(string $label = null)
     * @method Grid\Column|Collection is_official_account(string $label = null)
     * @method Grid\Column|Collection is_outh_open(string $label = null)
     * @method Grid\Column|Collection is_quick_order(string $label = null)
     * @method Grid\Column|Collection is_sales(string $label = null)
     * @method Grid\Column|Collection is_share_price(string $label = null)
     * @method Grid\Column|Collection kdniao_api_key(string $label = null)
     * @method Grid\Column|Collection kdniao_mch_id(string $label = null)
     * @method Grid\Column|Collection member_content(string $label = null)
     * @method Grid\Column|Collection nav_count(string $label = null)
     * @method Grid\Column|Collection o2o_max_distance(string $label = null)
     * @method Grid\Column|Collection order_send_tpl(string $label = null)
     * @method Grid\Column|Collection over_day(string $label = null)
     * @method Grid\Column|Collection purchase_frame(string $label = null)
     * @method Grid\Column|Collection quick_order_type(string $label = null)
     * @method Grid\Column|Collection quick_user_type(string $label = null)
     * @method Grid\Column|Collection recommend_count(string $label = null)
     * @method Grid\Column|Collection search_hot_content(string $label = null)
     * @method Grid\Column|Collection search_hot_open(string $label = null)
     * @method Grid\Column|Collection send_type(string $label = null)
     * @method Grid\Column|Collection show_customer_service(string $label = null)
     * @method Grid\Column|Collection use_wechat_platform_pay(string $label = null)
     * @method Grid\Column|Collection wechat_app_id(string $label = null)
     * @method Grid\Column|Collection wechat_platform_id(string $label = null)
     * @method Grid\Column|Collection class(string $label = null)
     * @method Grid\Column|Collection delay_seconds(string $label = null)
     * @method Grid\Column|Collection is_executed(string $label = null)
     * @method Grid\Column|Collection params(string $label = null)
     * @method Grid\Column|Collection tpl_id(string $label = null)
     * @method Grid\Column|Collection tpl_name(string $label = null)
     * @method Grid\Column|Collection cat_template(string $label = null)
     * @method Grid\Column|Collection deliveryDay(string $label = null)
     * @method Grid\Column|Collection EfficientGoodsCardNum(string $label = null)
     * @method Grid\Column|Collection EfficientGoodsCardOrgan(string $label = null)
     * @method Grid\Column|Collection EfficientGoodsImagePath(string $label = null)
     * @method Grid\Column|Collection energy_type(string $label = null)
     * @method Grid\Column|Collection import_type(string $label = null)
     * @method Grid\Column|Collection model_number(string $label = null)
     * @method Grid\Column|Collection protection_type(string $label = null)
     * @method Grid\Column|Collection sku(string $label = null)
     * @method Grid\Column|Collection dep_name(string $label = null)
     * @method Grid\Column|Collection drawer_name(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection invoice(string $label = null)
     * @method Grid\Column|Collection invoice_title(string $label = null)
     * @method Grid\Column|Collection mode(string $label = null)
     * @method Grid\Column|Collection order_price(string $label = null)
     * @method Grid\Column|Collection total(string $label = null)
     * @method Grid\Column|Collection yggc_order(string $label = null)
     * @method Grid\Column|Collection unitPrice(string $label = null)
     * @method Grid\Column|Collection agree_count(string $label = null)
     * @method Grid\Column|Collection is_chosen(string $label = null)
     * @method Grid\Column|Collection layout(string $label = null)
     * @method Grid\Column|Collection qrcode_pic(string $label = null)
     * @method Grid\Column|Collection read_count(string $label = null)
     * @method Grid\Column|Collection sub_title(string $label = null)
     * @method Grid\Column|Collection virtual_agree_count(string $label = null)
     * @method Grid\Column|Collection virtual_favorite_count(string $label = null)
     * @method Grid\Column|Collection virtual_read_count(string $label = null)
     * @method Grid\Column|Collection topic_id(string $label = null)
     * @method Grid\Column|Collection aliyun(string $label = null)
     * @method Grid\Column|Collection qcloud(string $label = null)
     * @method Grid\Column|Collection qiniu(string $label = null)
     * @method Grid\Column|Collection storage_type(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection file_name(string $label = null)
     * @method Grid\Column|Collection file_url(string $label = null)
     * @method Grid\Column|Collection group_id(string $label = null)
     * @method Grid\Column|Collection img_height(string $label = null)
     * @method Grid\Column|Collection img_width(string $label = null)
     * @method Grid\Column|Collection size(string $label = null)
     * @method Grid\Column|Collection app_source(string $label = null)
     * @method Grid\Column|Collection apple_openid(string $label = null)
     * @method Grid\Column|Collection avatar_url(string $label = null)
     * @method Grid\Column|Collection binding(string $label = null)
     * @method Grid\Column|Collection blacklist(string $label = null)
     * @method Grid\Column|Collection clientid(string $label = null)
     * @method Grid\Column|Collection comments(string $label = null)
     * @method Grid\Column|Collection contact_way(string $label = null)
     * @method Grid\Column|Collection is_app(string $label = null)
     * @method Grid\Column|Collection is_clerk(string $label = null)
     * @method Grid\Column|Collection is_distributor(string $label = null)
     * @method Grid\Column|Collection is_web(string $label = null)
     * @method Grid\Column|Collection parent_user_id(string $label = null)
     * @method Grid\Column|Collection saas_id(string $label = null)
     * @method Grid\Column|Collection total_integral(string $label = null)
     * @method Grid\Column|Collection wechat_platform_open_id(string $label = null)
     * @method Grid\Column|Collection wechat_union_id(string $label = null)
     * @method Grid\Column|Collection is_pass(string $label = null)
     * @method Grid\Column|Collection card_content(string $label = null)
     * @method Grid\Column|Collection card_name(string $label = null)
     * @method Grid\Column|Collection card_pic_url(string $label = null)
     * @method Grid\Column|Collection clerk_time(string $label = null)
     * @method Grid\Column|Collection is_use(string $label = null)
     * @method Grid\Column|Collection surplus(string $label = null)
     * @method Grid\Column|Collection coupon_auto_send_id(string $label = null)
     * @method Grid\Column|Collection mode_value(string $label = null)
     * @method Grid\Column|Collection times(string $label = null)
     * @method Grid\Column|Collection after_change(string $label = null)
     * @method Grid\Column|Collection before_change(string $label = null)
     * @method Grid\Column|Collection is_consumer_card(string $label = null)
     * @method Grid\Column|Collection key_name(string $label = null)
     * @method Grid\Column|Collection pasttime(string $label = null)
     * @method Grid\Column|Collection role_tab(string $label = null)
     * @method Grid\Column|Collection use_dis(string $label = null)
     * @method Grid\Column|Collection usetime(string $label = null)
     * @method Grid\Column|Collection vcd_sort(string $label = null)
     * @method Grid\Column|Collection vr_cat(string $label = null)
     * @method Grid\Column|Collection key_salt(string $label = null)
     * @method Grid\Column|Collection role_cont(string $label = null)
     * @method Grid\Column|Collection use_order(string $label = null)
     * @method Grid\Column|Collection use_uid(string $label = null)
     * @method Grid\Column|Collection vcd_id(string $label = null)
     * @method Grid\Column|Collection vcl_sort(string $label = null)
     * @method Grid\Column|Collection examine_msg(string $label = null)
     * @method Grid\Column|Collection app_secret(string $label = null)
     * @method Grid\Column|Collection cert_pem(string $label = null)
     * @method Grid\Column|Collection key_pem(string $label = null)
     * @method Grid\Column|Collection original_id(string $label = null)
     * @method Grid\Column|Collection uni_app_id(string $label = null)
     * @method Grid\Column|Collection web_app_id(string $label = null)
     * @method Grid\Column|Collection web_app_secret(string $label = null)
     * @method Grid\Column|Collection api_key(string $label = null)
     * @method Grid\Column|Collection apiv3_key(string $label = null)
     * @method Grid\Column|Collection platform_cert_date(string $label = null)
     * @method Grid\Column|Collection platform_cert_pem(string $label = null)
     * @method Grid\Column|Collection platform_serial_no(string $label = null)
     * @method Grid\Column|Collection serial_no(string $label = null)
     * @method Grid\Column|Collection not_pay_tpl(string $label = null)
     * @method Grid\Column|Collection pay_tpl(string $label = null)
     * @method Grid\Column|Collection refund_tpl(string $label = null)
     * @method Grid\Column|Collection revoke_tpl(string $label = null)
     * @method Grid\Column|Collection send_tpl(string $label = null)
     * @method Grid\Column|Collection create_comment_tab(string $label = null)
     * @method Grid\Column|Collection create_goods_tab(string $label = null)
     * @method Grid\Column|Collection create_like_tab(string $label = null)
     * @method Grid\Column|Collection feeds_img(string $label = null)
     * @method Grid\Column|Collection feeds_img_link(string $label = null)
     * @method Grid\Column|Collection goods_list(string $label = null)
     * @method Grid\Column|Collection live_backimg(string $label = null)
     * @method Grid\Column|Collection live_backimg_link(string $label = null)
     * @method Grid\Column|Collection live_nickname(string $label = null)
     * @method Grid\Column|Collection live_size(string $label = null)
     * @method Grid\Column|Collection live_title(string $label = null)
     * @method Grid\Column|Collection live_type(string $label = null)
     * @method Grid\Column|Collection notice_url(string $label = null)
     * @method Grid\Column|Collection push_url(string $label = null)
     * @method Grid\Column|Collection res_desc(string $label = null)
     * @method Grid\Column|Collection room_id(string $label = null)
     * @method Grid\Column|Collection share_img(string $label = null)
     * @method Grid\Column|Collection share_img_link(string $label = null)
     * @method Grid\Column|Collection wx_account(string $label = null)
     * @method Grid\Column|Collection wxll_desc(string $label = null)
     * @method Grid\Column|Collection audit_id(string $label = null)
     * @method Grid\Column|Collection cover_img_url(string $label = null)
     * @method Grid\Column|Collection end_price(string $label = null)
     * @method Grid\Column|Collection jump_url(string $label = null)
     * @method Grid\Column|Collection start_price(string $label = null)
     * @method Grid\Column|Collection third_party_tag(string $label = null)
     * @method Grid\Column|Collection wx_goods_id(string $label = null)
     * @method Grid\Column|Collection anchor_name(string $label = null)
     * @method Grid\Column|Collection goods(string $label = null)
     * @method Grid\Column|Collection goods_shelves(string $label = null)
     * @method Grid\Column|Collection is_pull_replay(string $label = null)
     * @method Grid\Column|Collection live_status(string $label = null)
     * @method Grid\Column|Collection roomid(string $label = null)
     * @method Grid\Column|Collection wx_goods_ids(string $label = null)
     * @method Grid\Column|Collection media_url(string $label = null)
     * @method Grid\Column|Collection is_refund(string $label = null)
     * @method Grid\Column|Collection refund_time(string $label = null)
     * @method Grid\Column|Collection use_time(string $label = null)
     * @method Grid\Column|Collection cat(string $label = null)
     * @method Grid\Column|Collection refund_notice(string $label = null)
     * @method Grid\Column|Collection success_notice(string $label = null)
     * @method Grid\Column|Collection consigneeAddress(string $label = null)
     * @method Grid\Column|Collection consigneeMobile(string $label = null)
     * @method Grid\Column|Collection consigneeName(string $label = null)
     * @method Grid\Column|Collection creatorMobile(string $label = null)
     * @method Grid\Column|Collection creatorName(string $label = null)
     * @method Grid\Column|Collection creatorOrgName(string $label = null)
     * @method Grid\Column|Collection invoiceAddress(string $label = null)
     * @method Grid\Column|Collection invoiceTitle(string $label = null)
     * @method Grid\Column|Collection invoiceType(string $label = null)
     * @method Grid\Column|Collection itins(string $label = null)
     * @method Grid\Column|Collection payOrgName(string $label = null)
     * @method Grid\Column|Collection telephone(string $label = null)
     * @method Grid\Column|Collection yc_order_no(string $label = null)
     * @method Grid\Column|Collection zycg_url(string $label = null)
     * @method Grid\Column|Collection discountRate(string $label = null)
     * @method Grid\Column|Collection colour(string $label = null)
     * @method Grid\Column|Collection rate(string $label = null)
     * @method Grid\Column|Collection companyCustNo(string $label = null)
     * @method Grid\Column|Collection invoiceAccount(string $label = null)
     * @method Grid\Column|Collection invoiceAddr(string $label = null)
     * @method Grid\Column|Collection invoiceBank(string $label = null)
     * @method Grid\Column|Collection invoiceContent(string $label = null)
     * @method Grid\Column|Collection orderId(string $label = null)
     * @method Grid\Column|Collection orderType(string $label = null)
     * @method Grid\Column|Collection receiverName(string $label = null)
     * @method Grid\Column|Collection servFee(string $label = null)
     * @method Grid\Column|Collection taxno(string $label = null)
     * @method Grid\Column|Collection tradeNo(string $label = null)
     * @method Grid\Column|Collection region_id(string $label = null)
     * @method Grid\Column|Collection region_name(string $label = null)
     * @method Grid\Column|Collection region_type(string $label = null)
     * @method Grid\Column|Collection zzds_url(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection name
     * @property Show\Field|Collection version
     * @property Show\Field|Collection alias
     * @property Show\Field|Collection authors
     * @property Show\Field|Collection enable
     * @property Show\Field|Collection imported
     * @property Show\Field|Collection config
     * @property Show\Field|Collection require
     * @property Show\Field|Collection require_dev
     * @property Show\Field|Collection width
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection id
     * @property Show\Field|Collection img_url
     * @property Show\Field|Collection position
     * @property Show\Field|Collection status
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection address
     * @property Show\Field|Collection uid
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection order
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection input
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection method
     * @property Show\Field|Collection path
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection password
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection username
     * @property Show\Field|Collection content
     * @property Show\Field|Collection is_del
     * @property Show\Field|Collection pidcard
     * @property Show\Field|Collection pname
     * @property Show\Field|Collection pphone
     * @property Show\Field|Collection company_code
     * @property Show\Field|Collection contact_name
     * @property Show\Field|Collection contact_tel
     * @property Show\Field|Collection date
     * @property Show\Field|Collection flight_no
     * @property Show\Field|Collection from
     * @property Show\Field|Collection item_id
     * @property Show\Field|Collection order_no
     * @property Show\Field|Collection passagers
     * @property Show\Field|Collection pay_channel
     * @property Show\Field|Collection price
     * @property Show\Field|Collection seat_code
     * @property Show\Field|Collection to
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection assets_name
     * @property Show\Field|Collection assets_type_id
     * @property Show\Field|Collection change_times
     * @property Show\Field|Collection freeze_amount
     * @property Show\Field|Collection amount_before_change
     * @property Show\Field|Collection operate_type
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection tx_hash
     * @property Show\Field|Collection user_agent
     * @property Show\Field|Collection can_withdraw
     * @property Show\Field|Collection contract_address
     * @property Show\Field|Collection large_withdraw_amount
     * @property Show\Field|Collection recharge_status
     * @property Show\Field|Collection withdraw_fee
     * @property Show\Field|Collection id_card
     * @property Show\Field|Collection id_card_img
     * @property Show\Field|Collection id_card_people_img
     * @property Show\Field|Collection msg
     * @property Show\Field|Collection reason
     * @property Show\Field|Collection img
     * @property Show\Field|Collection img2
     * @property Show\Field|Collection img_details1
     * @property Show\Field|Collection img_details2
     * @property Show\Field|Collection img_details3
     * @property Show\Field|Collection phone
     * @property Show\Field|Collection work
     * @property Show\Field|Collection sort
     * @property Show\Field|Collection banners
     * @property Show\Field|Collection business_apply_id
     * @property Show\Field|Collection category_id
     * @property Show\Field|Collection city
     * @property Show\Field|Collection contact_number
     * @property Show\Field|Collection district
     * @property Show\Field|Collection is_recommend
     * @property Show\Field|Collection is_status
     * @property Show\Field|Collection lg
     * @property Show\Field|Collection limit_price
     * @property Show\Field|Collection lt
     * @property Show\Field|Collection main_business
     * @property Show\Field|Collection province
     * @property Show\Field|Collection run_time
     * @property Show\Field|Collection state
     * @property Show\Field|Collection code
     * @property Show\Field|Collection p_code
     * @property Show\Field|Collection new_user_number
     * @property Show\Field|Collection total_consumption
     * @property Show\Field|Collection user_active
     * @property Show\Field|Collection user_number
     * @property Show\Field|Collection yesterday_consumption
     * @property Show\Field|Collection oid
     * @property Show\Field|Collection type
     * @property Show\Field|Collection usdt_amount
     * @property Show\Field|Collection user_name
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection activityState
     * @property Show\Field|Collection consumer_uid
     * @property Show\Field|Collection role
     * @property Show\Field|Collection business_uid
     * @property Show\Field|Collection is_confirm
     * @property Show\Field|Collection profit_price
     * @property Show\Field|Collection profit_ratio
     * @property Show\Field|Collection shop_order_id
     * @property Show\Field|Collection order_id
     * @property Show\Field|Collection submenu
     * @property Show\Field|Collection cat_id
     * @property Show\Field|Collection data
     * @property Show\Field|Collection error
     * @property Show\Field|Collection log
     * @property Show\Field|Collection import_day
     * @property Show\Field|Collection line_up
     * @property Show\Field|Collection member_gl_oid
     * @property Show\Field|Collection pay_status
     * @property Show\Field|Collection to_be_added_integral
     * @property Show\Field|Collection to_status
     * @property Show\Field|Collection order_nos
     * @property Show\Field|Collection return_type
     * @property Show\Field|Collection trade_no
     * @property Show\Field|Collection aid
     * @property Show\Field|Collection bill_state
     * @property Show\Field|Collection bill_time
     * @property Show\Field|Collection ctime
     * @property Show\Field|Collection etime
     * @property Show\Field|Collection idcard_no
     * @property Show\Field|Collection idcard_type
     * @property Show\Field|Collection legs
     * @property Show\Field|Collection order_state
     * @property Show\Field|Collection order_type
     * @property Show\Field|Collection other_fee
     * @property Show\Field|Collection passenger_name
     * @property Show\Field|Collection passenger_tel
     * @property Show\Field|Collection pay_cash
     * @property Show\Field|Collection recevie_station
     * @property Show\Field|Collection refund_fee
     * @property Show\Field|Collection seat_type
     * @property Show\Field|Collection start_station
     * @property Show\Field|Collection start_time
     * @property Show\Field|Collection ticket_no
     * @property Show\Field|Collection total_face_price
     * @property Show\Field|Collection total_other_fee
     * @property Show\Field|Collection total_pay_cash
     * @property Show\Field|Collection total_refund_amount
     * @property Show\Field|Collection train_no
     * @property Show\Field|Collection utime
     * @property Show\Field|Collection child_ages
     * @property Show\Field|Collection child_num
     * @property Show\Field|Collection contact_email
     * @property Show\Field|Collection contact_phone
     * @property Show\Field|Collection customer_arrive_time
     * @property Show\Field|Collection customer_name
     * @property Show\Field|Collection goods_title
     * @property Show\Field|Collection hotel_id
     * @property Show\Field|Collection in_date
     * @property Show\Field|Collection man
     * @property Show\Field|Collection money
     * @property Show\Field|Collection out_date
     * @property Show\Field|Collection special_remarks
     * @property Show\Field|Collection count_lk
     * @property Show\Field|Collection count_profit_price
     * @property Show\Field|Collection day
     * @property Show\Field|Collection dr_count
     * @property Show\Field|Collection other_price
     * @property Show\Field|Collection price_10
     * @property Show\Field|Collection price_20
     * @property Show\Field|Collection price_5
     * @property Show\Field|Collection switch
     * @property Show\Field|Collection create_type
     * @property Show\Field|Collection has_child
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection num
     * @property Show\Field|Collection order_mobile_id
     * @property Show\Field|Collection account
     * @property Show\Field|Collection balance
     * @property Show\Field|Collection bill_cycle
     * @property Show\Field|Collection content_id
     * @property Show\Field|Collection contract_no
     * @property Show\Field|Collection item4
     * @property Show\Field|Collection pay_amount
     * @property Show\Field|Collection penalty
     * @property Show\Field|Collection prepaid_flag
     * @property Show\Field|Collection card_list
     * @property Show\Field|Collection channel
     * @property Show\Field|Collection created_time
     * @property Show\Field|Collection end_time
     * @property Show\Field|Collection out_trans_id
     * @property Show\Field|Collection party_order_id
     * @property Show\Field|Collection pay_amt
     * @property Show\Field|Collection pid
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection token
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection img_back
     * @property Show\Field|Collection img_just
     * @property Show\Field|Collection num_id
     * @property Show\Field|Collection second
     * @property Show\Field|Collection business
     * @property Show\Field|Collection business_lk_iets
     * @property Show\Field|Collection consumer
     * @property Show\Field|Collection consumer_lk_iets
     * @property Show\Field|Collection join_business
     * @property Show\Field|Collection join_consumer
     * @property Show\Field|Collection market
     * @property Show\Field|Collection new_business
     * @property Show\Field|Collection people
     * @property Show\Field|Collection platform
     * @property Show\Field|Collection share
     * @property Show\Field|Collection welfare
     * @property Show\Field|Collection reorder_id
     * @property Show\Field|Collection key
     * @property Show\Field|Collection value
     * @property Show\Field|Collection is_add_points
     * @property Show\Field|Collection sign_date
     * @property Show\Field|Collection total_num
     * @property Show\Field|Collection yx_uid
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection integral
     * @property Show\Field|Collection modified_time
     * @property Show\Field|Collection need_fee
     * @property Show\Field|Collection numeric
     * @property Show\Field|Collection order_from
     * @property Show\Field|Collection pay_time
     * @property Show\Field|Collection remarks
     * @property Show\Field|Collection telecom
     * @property Show\Field|Collection admin_id
     * @property Show\Field|Collection assets_id
     * @property Show\Field|Collection assets_type
     * @property Show\Field|Collection block_hash
     * @property Show\Field|Collection block_number
     * @property Show\Field|Collection data_id
     * @property Show\Field|Collection deal_type
     * @property Show\Field|Collection gas_price
     * @property Show\Field|Collection hash
     * @property Show\Field|Collection payee
     * @property Show\Field|Collection token_tx_amount
     * @property Show\Field|Collection tx_status
     * @property Show\Field|Collection access_token
     * @property Show\Field|Collection alipay_alipay_user_id
     * @property Show\Field|Collection alipay_user_id
     * @property Show\Field|Collection app_id
     * @property Show\Field|Collection auth_code
     * @property Show\Field|Collection expires_in
     * @property Show\Field|Collection is_used
     * @property Show\Field|Collection re_expires_in
     * @property Show\Field|Collection refresh_token
     * @property Show\Field|Collection scope
     * @property Show\Field|Collection source
     * @property Show\Field|Collection change_address_time
     * @property Show\Field|Collection change_password_ip
     * @property Show\Field|Collection change_password_time
     * @property Show\Field|Collection last_ip
     * @property Show\Field|Collection last_login
     * @property Show\Field|Collection img_hold
     * @property Show\Field|Collection money_before_change
     * @property Show\Field|Collection sys_mid
     * @property Show\Field|Collection edit_to_phone
     * @property Show\Field|Collection time
     * @property Show\Field|Collection alipay_account
     * @property Show\Field|Collection alipay_avatar
     * @property Show\Field|Collection alipay_nickname
     * @property Show\Field|Collection balance_allowance
     * @property Show\Field|Collection balance_consume
     * @property Show\Field|Collection balance_tuan
     * @property Show\Field|Collection ban_reason
     * @property Show\Field|Collection birth
     * @property Show\Field|Collection business_integral
     * @property Show\Field|Collection business_lk
     * @property Show\Field|Collection code_invite
     * @property Show\Field|Collection invite_uid
     * @property Show\Field|Collection is_auth
     * @property Show\Field|Collection lk
     * @property Show\Field|Collection market_business
     * @property Show\Field|Collection member_head
     * @property Show\Field|Collection member_status
     * @property Show\Field|Collection real_name
     * @property Show\Field|Collection return_business_integral
     * @property Show\Field|Collection return_integral
     * @property Show\Field|Collection return_lk
     * @property Show\Field|Collection salt
     * @property Show\Field|Collection sex
     * @property Show\Field|Collection shop_uid
     * @property Show\Field|Collection sign
     * @property Show\Field|Collection expires_at
     * @property Show\Field|Collection used
     * @property Show\Field|Collection actual_amount
     * @property Show\Field|Collection alipay_status
     * @property Show\Field|Collection balance_fee
     * @property Show\Field|Collection balance_type
     * @property Show\Field|Collection failed_reason
     * @property Show\Field|Collection handling_price
     * @property Show\Field|Collection handling_ratio
     * @property Show\Field|Collection out_trade_no
     * @property Show\Field|Collection pay_fund_order_id
     * @property Show\Field|Collection trans_date
     * @property Show\Field|Collection fee
     * @property Show\Field|Collection action_type
     * @property Show\Field|Collection addtime
     * @property Show\Field|Collection admin_ip
     * @property Show\Field|Collection admin_name
     * @property Show\Field|Collection is_delete
     * @property Show\Field|Collection obj_id
     * @property Show\Field|Collection result
     * @property Show\Field|Collection route
     * @property Show\Field|Collection store_id
     * @property Show\Field|Collection create_time
     * @property Show\Field|Collection unit_id
     * @property Show\Field|Collection alibaba_json
     * @property Show\Field|Collection city_id
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection district_id
     * @property Show\Field|Collection is_default
     * @property Show\Field|Collection lat
     * @property Show\Field|Collection lng
     * @property Show\Field|Collection province_id
     * @property Show\Field|Collection app_max_count
     * @property Show\Field|Collection auth_key
     * @property Show\Field|Collection expire_time
     * @property Show\Field|Collection permission
     * @property Show\Field|Collection display_name
     * @property Show\Field|Collection desc
     * @property Show\Field|Collection alias_name
     * @property Show\Field|Collection alipay_logon_id
     * @property Show\Field|Collection binding_alipay_logon_id
     * @property Show\Field|Collection biz_cards
     * @property Show\Field|Collection business_address
     * @property Show\Field|Collection cert_image
     * @property Show\Field|Collection cert_image_back
     * @property Show\Field|Collection cert_name
     * @property Show\Field|Collection cert_no
     * @property Show\Field|Collection cert_type
     * @property Show\Field|Collection contact_infos
     * @property Show\Field|Collection default_settle_rule
     * @property Show\Field|Collection external_id
     * @property Show\Field|Collection invoice_info
     * @property Show\Field|Collection legal_cert_back_image
     * @property Show\Field|Collection legal_cert_front_image
     * @property Show\Field|Collection legal_cert_no
     * @property Show\Field|Collection legal_cert_type
     * @property Show\Field|Collection legal_name
     * @property Show\Field|Collection license_auth_letter_image
     * @property Show\Field|Collection mcc
     * @property Show\Field|Collection mch_id
     * @property Show\Field|Collection merchant_type
     * @property Show\Field|Collection out_door_images
     * @property Show\Field|Collection qualifications
     * @property Show\Field|Collection service
     * @property Show\Field|Collection service_phone
     * @property Show\Field|Collection sign_time_with_isv
     * @property Show\Field|Collection sites
     * @property Show\Field|Collection smid
     * @property Show\Field|Collection article_cat_id
     * @property Show\Field|Collection add_time
     * @property Show\Field|Collection is_bottom
     * @property Show\Field|Collection is_show
     * @property Show\Field|Collection attr_group_id
     * @property Show\Field|Collection attr_name
     * @property Show\Field|Collection attr_group_name
     * @property Show\Field|Collection creator_id
     * @property Show\Field|Collection permission_name
     * @property Show\Field|Collection open_type
     * @property Show\Field|Collection page_url
     * @property Show\Field|Collection pic_url
     * @property Show\Field|Collection skip_url
     * @property Show\Field|Collection begin_time
     * @property Show\Field|Collection goods_id
     * @property Show\Field|Collection min_price
     * @property Show\Field|Collection status_data
     * @property Show\Field|Collection attr
     * @property Show\Field|Collection original_price
     * @property Show\Field|Collection is_mail
     * @property Show\Field|Collection is_print
     * @property Show\Field|Collection is_share
     * @property Show\Field|Collection is_sms
     * @property Show\Field|Collection share_title
     * @property Show\Field|Collection initials
     * @property Show\Field|Collection pinyin
     * @property Show\Field|Collection parts_id
     * @property Show\Field|Collection bank_name
     * @property Show\Field|Collection pay_type
     * @property Show\Field|Collection service_charge
     * @property Show\Field|Collection advert_pic
     * @property Show\Field|Collection advert_url
     * @property Show\Field|Collection big_pic_url
     * @property Show\Field|Collection pc_advert_url
     * @property Show\Field|Collection pc_icon
     * @property Show\Field|Collection seo_desc
     * @property Show\Field|Collection seo_keyword
     * @property Show\Field|Collection subtitle
     * @property Show\Field|Collection color
     * @property Show\Field|Collection rgb
     * @property Show\Field|Collection is_expire
     * @property Show\Field|Collection key_val
     * @property Show\Field|Collection sur_price
     * @property Show\Field|Collection total_price
     * @property Show\Field|Collection vd_id
     * @property Show\Field|Collection vl_id
     * @property Show\Field|Collection appoint_type
     * @property Show\Field|Collection cat_id_list
     * @property Show\Field|Collection discount
     * @property Show\Field|Collection discount_type
     * @property Show\Field|Collection expire_day
     * @property Show\Field|Collection expire_type
     * @property Show\Field|Collection goods_id_list
     * @property Show\Field|Collection is_integral
     * @property Show\Field|Collection is_join
     * @property Show\Field|Collection rule
     * @property Show\Field|Collection sub_price
     * @property Show\Field|Collection total_count
     * @property Show\Field|Collection user_num
     * @property Show\Field|Collection coupon_id
     * @property Show\Field|Collection event
     * @property Show\Field|Collection send_times
     * @property Show\Field|Collection customer_pwd
     * @property Show\Field|Collection express_id
     * @property Show\Field|Collection month_code
     * @property Show\Field|Collection send_name
     * @property Show\Field|Collection send_site
     * @property Show\Field|Collection template_size
     * @property Show\Field|Collection adverse_distribution
     * @property Show\Field|Collection adverse_kilometres
     * @property Show\Field|Collection adverse_lat_and_lon
     * @property Show\Field|Collection adverse_money
     * @property Show\Field|Collection lat_and_lon
     * @property Show\Field|Collection order_time
     * @property Show\Field|Collection routine_distribution
     * @property Show\Field|Collection routine_kilometres
     * @property Show\Field|Collection routine_money
     * @property Show\Field|Collection adcode
     * @property Show\Field|Collection citycode
     * @property Show\Field|Collection level
     * @property Show\Field|Collection is_index
     * @property Show\Field|Collection template_id
     * @property Show\Field|Collection template
     * @property Show\Field|Collection default
     * @property Show\Field|Collection required
     * @property Show\Field|Collection tip
     * @property Show\Field|Collection form_id
     * @property Show\Field|Collection is_usable
     * @property Show\Field|Collection send_count
     * @property Show\Field|Collection transaction_id
     * @property Show\Field|Collection wechat_open_id
     * @property Show\Field|Collection coupon_expire
     * @property Show\Field|Collection coupon_money
     * @property Show\Field|Collection coupon_total_money
     * @property Show\Field|Collection coupon_use_minimum
     * @property Show\Field|Collection distribute_type
     * @property Show\Field|Collection is_finish
     * @property Show\Field|Collection game_open
     * @property Show\Field|Collection game_time
     * @property Show\Field|Collection share_pic
     * @property Show\Field|Collection tpl_msg_id
     * @property Show\Field|Collection after_sales_id
     * @property Show\Field|Collection attr_setting_type
     * @property Show\Field|Collection auto_send
     * @property Show\Field|Collection auto_vr_cont
     * @property Show\Field|Collection brand_id
     * @property Show\Field|Collection card_data
     * @property Show\Field|Collection confine_count
     * @property Show\Field|Collection cost_price
     * @property Show\Field|Collection cover_pic
     * @property Show\Field|Collection freight
     * @property Show\Field|Collection full_cut
     * @property Show\Field|Collection goods_num
     * @property Show\Field|Collection hot_cakes
     * @property Show\Field|Collection individual_share
     * @property Show\Field|Collection is_best
     * @property Show\Field|Collection is_examine
     * @property Show\Field|Collection is_hot
     * @property Show\Field|Collection is_lead
     * @property Show\Field|Collection is_level
     * @property Show\Field|Collection is_negotiable
     * @property Show\Field|Collection is_recycle
     * @property Show\Field|Collection is_spell
     * @property Show\Field|Collection isSelf
     * @property Show\Field|Collection label_id
     * @property Show\Field|Collection lead_attr
     * @property Show\Field|Collection lead_price
     * @property Show\Field|Collection lead_type
     * @property Show\Field|Collection market_increase
     * @property Show\Field|Collection mch_is_best
     * @property Show\Field|Collection mch_is_hot
     * @property Show\Field|Collection mch_ratio
     * @property Show\Field|Collection mch_sort
     * @property Show\Field|Collection member_discount
     * @property Show\Field|Collection osg_id
     * @property Show\Field|Collection packing_id
     * @property Show\Field|Collection payment
     * @property Show\Field|Collection platform_ratio
     * @property Show\Field|Collection price_increase
     * @property Show\Field|Collection purchase_price
     * @property Show\Field|Collection quick_purchase
     * @property Show\Field|Collection rebate
     * @property Show\Field|Collection share_commission_first
     * @property Show\Field|Collection share_commission_second
     * @property Show\Field|Collection share_commission_third
     * @property Show\Field|Collection share_type
     * @property Show\Field|Collection supplierLoginId
     * @property Show\Field|Collection unit
     * @property Show\Field|Collection use_attr
     * @property Show\Field|Collection video_url
     * @property Show\Field|Collection virtual_sales
     * @property Show\Field|Collection vop_id
     * @property Show\Field|Collection vr_type
     * @property Show\Field|Collection wareQD
     * @property Show\Field|Collection wares_id
     * @property Show\Field|Collection wares_status
     * @property Show\Field|Collection weight
     * @property Show\Field|Collection click
     * @property Show\Field|Collection card_id
     * @property Show\Field|Collection goods_parts_id
     * @property Show\Field|Collection relation_id
     * @property Show\Field|Collection good_id
     * @property Show\Field|Collection like_id
     * @property Show\Field|Collection style
     * @property Show\Field|Collection is_hide
     * @property Show\Field|Collection url
     * @property Show\Field|Collection is_virtual
     * @property Show\Field|Collection order_detail_id
     * @property Show\Field|Collection pic_list
     * @property Show\Field|Collection reply_content
     * @property Show\Field|Collection score
     * @property Show\Field|Collection score_star
     * @property Show\Field|Collection virtual_avatar
     * @property Show\Field|Collection virtual_user
     * @property Show\Field|Collection is_pay
     * @property Show\Field|Collection goods_pic_list
     * @property Show\Field|Collection explain
     * @property Show\Field|Collection operator
     * @property Show\Field|Collection operator_id
     * @property Show\Field|Collection address_data
     * @property Show\Field|Collection apply_delete
     * @property Show\Field|Collection clerk_id
     * @property Show\Field|Collection confirm_time
     * @property Show\Field|Collection express
     * @property Show\Field|Collection express_no
     * @property Show\Field|Collection express_price
     * @property Show\Field|Collection is_cancel
     * @property Show\Field|Collection is_comment
     * @property Show\Field|Collection is_offline
     * @property Show\Field|Collection is_sale
     * @property Show\Field|Collection is_send
     * @property Show\Field|Collection offline_qrcode
     * @property Show\Field|Collection pay_price
     * @property Show\Field|Collection send_time
     * @property Show\Field|Collection shop_id
     * @property Show\Field|Collection words
     * @property Show\Field|Collection goods_name
     * @property Show\Field|Collection pay_integral
     * @property Show\Field|Collection pic
     * @property Show\Field|Collection integral_shuoming
     * @property Show\Field|Collection register_continuation
     * @property Show\Field|Collection register_integral
     * @property Show\Field|Collection register_reward
     * @property Show\Field|Collection register_rule
     * @property Show\Field|Collection taxpayer
     * @property Show\Field|Collection totalprice
     * @property Show\Field|Collection skuId
     * @property Show\Field|Collection cn_name
     * @property Show\Field|Collection en_name
     * @property Show\Field|Collection cat_num
     * @property Show\Field|Collection categoryAttr
     * @property Show\Field|Collection param
     * @property Show\Field|Collection saleAttr
     * @property Show\Field|Collection attr_json
     * @property Show\Field|Collection cat_attr_id
     * @property Show\Field|Collection cat_name
     * @property Show\Field|Collection goods_no
     * @property Show\Field|Collection is_upsert
     * @property Show\Field|Collection isEnergySav
     * @property Show\Field|Collection isEnvironmental
     * @property Show\Field|Collection packing_list
     * @property Show\Field|Collection taxCode
     * @property Show\Field|Collection taxInfo
     * @property Show\Field|Collection addTime
     * @property Show\Field|Collection thirdSkuId
     * @property Show\Field|Collection typeMsg
     * @property Show\Field|Collection cancel_status
     * @property Show\Field|Collection cityId
     * @property Show\Field|Collection countyId
     * @property Show\Field|Collection invoiceState
     * @property Show\Field|Collection is_true
     * @property Show\Field|Collection jjys_order_no
     * @property Show\Field|Collection provinceId
     * @property Show\Field|Collection submitStatus
     * @property Show\Field|Collection townId
     * @property Show\Field|Collection zip
     * @property Show\Field|Collection jjys_url
     * @property Show\Field|Collection purch_appkey
     * @property Show\Field|Collection purch_appsecret
     * @property Show\Field|Collection purch_suppliercode
     * @property Show\Field|Collection supplier_appid
     * @property Show\Field|Collection supplier_appkey
     * @property Show\Field|Collection supplier_appsecret
     * @property Show\Field|Collection buy_prompt
     * @property Show\Field|Collection image
     * @property Show\Field|Collection level_image
     * @property Show\Field|Collection synopsis
     * @property Show\Field|Collection after_level
     * @property Show\Field|Collection current_level
     * @property Show\Field|Collection icon_url
     * @property Show\Field|Collection actype
     * @property Show\Field|Collection describe
     * @property Show\Field|Collection follow_num
     * @property Show\Field|Collection front_img
     * @property Show\Field|Collection head_img
     * @property Show\Field|Collection idcard
     * @property Show\Field|Collection is_recom
     * @property Show\Field|Collection live_power
     * @property Show\Field|Collection live_price
     * @property Show\Field|Collection max_goods
     * @property Show\Field|Collection nickname
     * @property Show\Field|Collection real_tel
     * @property Show\Field|Collection rect_time
     * @property Show\Field|Collection refuse_desc
     * @property Show\Field|Collection anchor_id
     * @property Show\Field|Collection refund_desc
     * @property Show\Field|Collection unumber
     * @property Show\Field|Collection goods_type
     * @property Show\Field|Collection back_img
     * @property Show\Field|Collection comment_num
     * @property Show\Field|Collection cover_img
     * @property Show\Field|Collection endtime
     * @property Show\Field|Collection fict_like
     * @property Show\Field|Collection fict_watch
     * @property Show\Field|Collection get_past
     * @property Show\Field|Collection like_num
     * @property Show\Field|Collection play_addr
     * @property Show\Field|Collection push_addr
     * @property Show\Field|Collection real_endtime
     * @property Show\Field|Collection real_starttime
     * @property Show\Field|Collection sale_goods
     * @property Show\Field|Collection starttime
     * @property Show\Field|Collection un_key
     * @property Show\Field|Collection watch_num
     * @property Show\Field|Collection cs_drawing
     * @property Show\Field|Collection cs_overtime
     * @property Show\Field|Collection cs_setting
     * @property Show\Field|Collection cs_tips
     * @property Show\Field|Collection cs_type
     * @property Show\Field|Collection least_money
     * @property Show\Field|Collection money_comm
     * @property Show\Field|Collection upper_money
     * @property Show\Field|Collection stock
     * @property Show\Field|Collection update_time
     * @property Show\Field|Collection child_id
     * @property Show\Field|Collection lottery_id
     * @property Show\Field|Collection lucky_code
     * @property Show\Field|Collection obtain_time
     * @property Show\Field|Collection raffle_time
     * @property Show\Field|Collection receive_mail
     * @property Show\Field|Collection send_mail
     * @property Show\Field|Collection send_pwd
     * @property Show\Field|Collection account_money
     * @property Show\Field|Collection account_type
     * @property Show\Field|Collection alipay_account_name
     * @property Show\Field|Collection choice_invoice
     * @property Show\Field|Collection collection_app_key
     * @property Show\Field|Collection fictitious_follow
     * @property Show\Field|Collection header_bg
     * @property Show\Field|Collection is_invoice
     * @property Show\Field|Collection is_lock
     * @property Show\Field|Collection is_open
     * @property Show\Field|Collection is_popular
     * @property Show\Field|Collection latitude
     * @property Show\Field|Collection logo
     * @property Show\Field|Collection longitude
     * @property Show\Field|Collection main_content
     * @property Show\Field|Collection mch_common_cat_id
     * @property Show\Field|Collection mch_message
     * @property Show\Field|Collection mch_money
     * @property Show\Field|Collection mch_money_status
     * @property Show\Field|Collection mch_type
     * @property Show\Field|Collection o2o_cat_id
     * @property Show\Field|Collection realname
     * @property Show\Field|Collection review_result
     * @property Show\Field|Collection review_status
     * @property Show\Field|Collection review_time
     * @property Show\Field|Collection service_tel
     * @property Show\Field|Collection summary
     * @property Show\Field|Collection tel
     * @property Show\Field|Collection transfer_rate
     * @property Show\Field|Collection wechat_name
     * @property Show\Field|Collection wx_account_name
     * @property Show\Field|Collection rate_data
     * @property Show\Field|Collection type_data
     * @property Show\Field|Collection virtual_type
     * @property Show\Field|Collection ctr_type
     * @property Show\Field|Collection edittime
     * @property Show\Field|Collection audit_notes
     * @property Show\Field|Collection audit_time
     * @property Show\Field|Collection ctr_id
     * @property Show\Field|Collection is_agree
     * @property Show\Field|Collection ms_id
     * @property Show\Field|Collection top_time
     * @property Show\Field|Collection group
     * @property Show\Field|Collection is_read
     * @property Show\Field|Collection is_sound
     * @property Show\Field|Collection is_enable
     * @property Show\Field|Collection visit_date
     * @property Show\Field|Collection open_time
     * @property Show\Field|Collection buy_limit
     * @property Show\Field|Collection buy_max
     * @property Show\Field|Collection open_date
     * @property Show\Field|Collection coupon
     * @property Show\Field|Collection is_discount
     * @property Show\Field|Collection sales
     * @property Show\Field|Collection before_update_express
     * @property Show\Field|Collection before_update_price
     * @property Show\Field|Collection coupon_sub_price
     * @property Show\Field|Collection express_price_1
     * @property Show\Field|Collection first_price
     * @property Show\Field|Collection give_integral
     * @property Show\Field|Collection integral_amount
     * @property Show\Field|Collection is_partner
     * @property Show\Field|Collection is_price
     * @property Show\Field|Collection is_revoke
     * @property Show\Field|Collection is_sum
     * @property Show\Field|Collection is_transfer
     * @property Show\Field|Collection limit_time
     * @property Show\Field|Collection order_source
     * @property Show\Field|Collection parent_id_1
     * @property Show\Field|Collection parent_id_2
     * @property Show\Field|Collection second_price
     * @property Show\Field|Collection seller_comments
     * @property Show\Field|Collection share_price
     * @property Show\Field|Collection third_price
     * @property Show\Field|Collection user_coupon_id
     * @property Show\Field|Collection mch_describe
     * @property Show\Field|Collection mch_logistics
     * @property Show\Field|Collection mch_service
     * @property Show\Field|Collection address_id
     * @property Show\Field|Collection is_return
     * @property Show\Field|Collection is_user_send
     * @property Show\Field|Collection order_refund_no
     * @property Show\Field|Collection refund_price
     * @property Show\Field|Collection response_time
     * @property Show\Field|Collection return_express
     * @property Show\Field|Collection return_express_no
     * @property Show\Field|Collection user_send_express
     * @property Show\Field|Collection user_send_express_no
     * @property Show\Field|Collection is_area
     * @property Show\Field|Collection unpaid
     * @property Show\Field|Collection appeal_img
     * @property Show\Field|Collection appeal_status
     * @property Show\Field|Collection appeal_text
     * @property Show\Field|Collection appeal_type
     * @property Show\Field|Collection comment_id
     * @property Show\Field|Collection is_appeal
     * @property Show\Field|Collection coupon_amount
     * @property Show\Field|Collection coupon_name
     * @property Show\Field|Collection coupon_stock
     * @property Show\Field|Collection coupon_type
     * @property Show\Field|Collection period_validity
     * @property Show\Field|Collection restriction_type
     * @property Show\Field|Collection times_collection
     * @property Show\Field|Collection use_threshold
     * @property Show\Field|Collection full_reduction
     * @property Show\Field|Collection cancel_type
     * @property Show\Field|Collection express_rider
     * @property Show\Field|Collection express_tel
     * @property Show\Field|Collection full_price
     * @property Show\Field|Collection invoice_id
     * @property Show\Field|Collection invoice_type
     * @property Show\Field|Collection is_full
     * @property Show\Field|Collection is_overtime
     * @property Show\Field|Collection is_reply
     * @property Show\Field|Collection is_reservation
     * @property Show\Field|Collection order_status
     * @property Show\Field|Collection reply_time
     * @property Show\Field|Collection reservation_time
     * @property Show\Field|Collection packing_fee
     * @property Show\Field|Collection reality_price
     * @property Show\Field|Collection dada_api_url
     * @property Show\Field|Collection dada_id
     * @property Show\Field|Collection dada_key
     * @property Show\Field|Collection dada_secret
     * @property Show\Field|Collection dada_shop_id
     * @property Show\Field|Collection delivery_method
     * @property Show\Field|Collection end_hours
     * @property Show\Field|Collection fengniao_api_url
     * @property Show\Field|Collection fengniao_id
     * @property Show\Field|Collection fengniao_key
     * @property Show\Field|Collection is_bad_weather
     * @property Show\Field|Collection is_dial
     * @property Show\Field|Collection is_evaluate
     * @property Show\Field|Collection is_self_mention
     * @property Show\Field|Collection meituan_api_url
     * @property Show\Field|Collection meituan_id
     * @property Show\Field|Collection meituan_key
     * @property Show\Field|Collection shansong_api_url
     * @property Show\Field|Collection shansong_id
     * @property Show\Field|Collection shansong_key
     * @property Show\Field|Collection shop_notices
     * @property Show\Field|Collection start_hours
     * @property Show\Field|Collection virtual_delivery_time
     * @property Show\Field|Collection ali_is_pay
     * @property Show\Field|Collection ali_order_no
     * @property Show\Field|Collection ali_refund
     * @property Show\Field|Collection ali_sum_price
     * @property Show\Field|Collection consumer_id
     * @property Show\Field|Collection consumer_price
     * @property Show\Field|Collection currency
     * @property Show\Field|Collection is_balance
     * @property Show\Field|Collection is_live
     * @property Show\Field|Collection is_live_price
     * @property Show\Field|Collection is_quick
     * @property Show\Field|Collection jdvop_is_invoice
     * @property Show\Field|Collection jdvop_is_pay
     * @property Show\Field|Collection jdvop_order_no
     * @property Show\Field|Collection jdvop_refund
     * @property Show\Field|Collection jdvop_sum_price
     * @property Show\Field|Collection live_id
     * @property Show\Field|Collection order_union_id
     * @property Show\Field|Collection send_email
     * @property Show\Field|Collection user_dedu_balance
     * @property Show\Field|Collection consumer_card_id
     * @property Show\Field|Collection is_exchange
     * @property Show\Field|Collection ordedr_sn
     * @property Show\Field|Collection ali_unit_price
     * @property Show\Field|Collection parts_price
     * @property Show\Field|Collection vr_data_id
     * @property Show\Field|Collection vr_list_id
     * @property Show\Field|Collection EBusinessID
     * @property Show\Field|Collection express_code
     * @property Show\Field|Collection printTeplate
     * @property Show\Field|Collection ali_json
     * @property Show\Field|Collection ali_refund_Id
     * @property Show\Field|Collection parent_id_3
     * @property Show\Field|Collection order_id_list
     * @property Show\Field|Collection diff_money
     * @property Show\Field|Collection finish
     * @property Show\Field|Collection info
     * @property Show\Field|Collection out_order_no
     * @property Show\Field|Collection sub_mchid
     * @property Show\Field|Collection bank_memo
     * @property Show\Field|Collection out_request_no
     * @property Show\Field|Collection withdraw_id
     * @property Show\Field|Collection gift_id
     * @property Show\Field|Collection image_url
     * @property Show\Field|Collection orderby
     * @property Show\Field|Collection pond_id
     * @property Show\Field|Collection deplete_register
     * @property Show\Field|Collection oppty
     * @property Show\Field|Collection probability
     * @property Show\Field|Collection printer_setting
     * @property Show\Field|Collection printer_type
     * @property Show\Field|Collection big
     * @property Show\Field|Collection block_id
     * @property Show\Field|Collection is_attr
     * @property Show\Field|Collection printer_id
     * @property Show\Field|Collection colonel
     * @property Show\Field|Collection group_num
     * @property Show\Field|Collection grouptime
     * @property Show\Field|Collection is_more
     * @property Show\Field|Collection is_only
     * @property Show\Field|Collection one_buy_limit
     * @property Show\Field|Collection group_time
     * @property Show\Field|Collection class_group
     * @property Show\Field|Collection is_group
     * @property Show\Field|Collection is_returnd
     * @property Show\Field|Collection is_success
     * @property Show\Field|Collection offline
     * @property Show\Field|Collection success_time
     * @property Show\Field|Collection avatar_position
     * @property Show\Field|Collection avatar_size
     * @property Show\Field|Collection font
     * @property Show\Field|Collection font_position
     * @property Show\Field|Collection preview
     * @property Show\Field|Collection qrcode_bg
     * @property Show\Field|Collection qrcode_position
     * @property Show\Field|Collection qrcode_size
     * @property Show\Field|Collection send_price
     * @property Show\Field|Collection continuation
     * @property Show\Field|Collection register_time
     * @property Show\Field|Collection account_info
     * @property Show\Field|Collection applyment_id
     * @property Show\Field|Collection business_addition_desc
     * @property Show\Field|Collection business_addition_pics
     * @property Show\Field|Collection business_license_info
     * @property Show\Field|Collection contact_info
     * @property Show\Field|Collection id_card_info
     * @property Show\Field|Collection id_doc_info
     * @property Show\Field|Collection id_doc_type
     * @property Show\Field|Collection merchant_shortname
     * @property Show\Field|Collection need_account_info
     * @property Show\Field|Collection organization_cert_info
     * @property Show\Field|Collection organization_type
     * @property Show\Field|Collection sales_scene_info
     * @property Show\Field|Collection company
     * @property Show\Field|Collection delivery_id
     * @property Show\Field|Collection exp_area
     * @property Show\Field|Collection post_code
     * @property Show\Field|Collection expire
     * @property Show\Field|Collection agree
     * @property Show\Field|Collection auto_share_val
     * @property Show\Field|Collection bank
     * @property Show\Field|Collection condition
     * @property Show\Field|Collection first
     * @property Show\Field|Collection first_name
     * @property Show\Field|Collection is_rebate
     * @property Show\Field|Collection min_money
     * @property Show\Field|Collection pic_url_1
     * @property Show\Field|Collection pic_url_2
     * @property Show\Field|Collection price_type
     * @property Show\Field|Collection remaining_sum
     * @property Show\Field|Collection second_name
     * @property Show\Field|Collection share_condition
     * @property Show\Field|Collection share_good_id
     * @property Show\Field|Collection share_good_status
     * @property Show\Field|Collection third
     * @property Show\Field|Collection third_name
     * @property Show\Field|Collection cover_url
     * @property Show\Field|Collection shop_time
     * @property Show\Field|Collection fictitious_collection
     * @property Show\Field|Collection fictitious_forward
     * @property Show\Field|Collection fictitious_give
     * @property Show\Field|Collection fictitious_play
     * @property Show\Field|Collection short_video_id
     * @property Show\Field|Collection tpl
     * @property Show\Field|Collection AccessKeyId
     * @property Show\Field|Collection AccessKeySecret
     * @property Show\Field|Collection tpl_code
     * @property Show\Field|Collection tpl_refund
     * @property Show\Field|Collection next_full
     * @property Show\Field|Collection next_reduce
     * @property Show\Field|Collection reduce
     * @property Show\Field|Collection spell_id
     * @property Show\Field|Collection full
     * @property Show\Field|Collection effective_time
     * @property Show\Field|Collection bail_currency
     * @property Show\Field|Collection step_num
     * @property Show\Field|Collection step_currency
     * @property Show\Field|Collection step_id
     * @property Show\Field|Collection type_id
     * @property Show\Field|Collection activity_rule
     * @property Show\Field|Collection convert_max
     * @property Show\Field|Collection convert_ratio
     * @property Show\Field|Collection invite_ratio
     * @property Show\Field|Collection qrcode_title
     * @property Show\Field|Collection ranking_num
     * @property Show\Field|Collection remind_time
     * @property Show\Field|Collection ratio
     * @property Show\Field|Collection remind
     * @property Show\Field|Collection acid
     * @property Show\Field|Collection after_sale_time
     * @property Show\Field|Collection buy_member
     * @property Show\Field|Collection cat_goods_cols
     * @property Show\Field|Collection cat_goods_count
     * @property Show\Field|Collection cat_style
     * @property Show\Field|Collection copyright
     * @property Show\Field|Collection copyright_pic_url
     * @property Show\Field|Collection copyright_url
     * @property Show\Field|Collection cut_thread
     * @property Show\Field|Collection delivery_time
     * @property Show\Field|Collection dial
     * @property Show\Field|Collection dial_pic
     * @property Show\Field|Collection good_negotiable
     * @property Show\Field|Collection home_page_module
     * @property Show\Field|Collection integration
     * @property Show\Field|Collection is_coupon
     * @property Show\Field|Collection is_member
     * @property Show\Field|Collection is_member_price
     * @property Show\Field|Collection is_official_account
     * @property Show\Field|Collection is_outh_open
     * @property Show\Field|Collection is_quick_order
     * @property Show\Field|Collection is_sales
     * @property Show\Field|Collection is_share_price
     * @property Show\Field|Collection kdniao_api_key
     * @property Show\Field|Collection kdniao_mch_id
     * @property Show\Field|Collection member_content
     * @property Show\Field|Collection nav_count
     * @property Show\Field|Collection o2o_max_distance
     * @property Show\Field|Collection order_send_tpl
     * @property Show\Field|Collection over_day
     * @property Show\Field|Collection purchase_frame
     * @property Show\Field|Collection quick_order_type
     * @property Show\Field|Collection quick_user_type
     * @property Show\Field|Collection recommend_count
     * @property Show\Field|Collection search_hot_content
     * @property Show\Field|Collection search_hot_open
     * @property Show\Field|Collection send_type
     * @property Show\Field|Collection show_customer_service
     * @property Show\Field|Collection use_wechat_platform_pay
     * @property Show\Field|Collection wechat_app_id
     * @property Show\Field|Collection wechat_platform_id
     * @property Show\Field|Collection class
     * @property Show\Field|Collection delay_seconds
     * @property Show\Field|Collection is_executed
     * @property Show\Field|Collection params
     * @property Show\Field|Collection tpl_id
     * @property Show\Field|Collection tpl_name
     * @property Show\Field|Collection cat_template
     * @property Show\Field|Collection deliveryDay
     * @property Show\Field|Collection EfficientGoodsCardNum
     * @property Show\Field|Collection EfficientGoodsCardOrgan
     * @property Show\Field|Collection EfficientGoodsImagePath
     * @property Show\Field|Collection energy_type
     * @property Show\Field|Collection import_type
     * @property Show\Field|Collection model_number
     * @property Show\Field|Collection protection_type
     * @property Show\Field|Collection sku
     * @property Show\Field|Collection dep_name
     * @property Show\Field|Collection drawer_name
     * @property Show\Field|Collection email
     * @property Show\Field|Collection invoice
     * @property Show\Field|Collection invoice_title
     * @property Show\Field|Collection mode
     * @property Show\Field|Collection order_price
     * @property Show\Field|Collection total
     * @property Show\Field|Collection yggc_order
     * @property Show\Field|Collection unitPrice
     * @property Show\Field|Collection agree_count
     * @property Show\Field|Collection is_chosen
     * @property Show\Field|Collection layout
     * @property Show\Field|Collection qrcode_pic
     * @property Show\Field|Collection read_count
     * @property Show\Field|Collection sub_title
     * @property Show\Field|Collection virtual_agree_count
     * @property Show\Field|Collection virtual_favorite_count
     * @property Show\Field|Collection virtual_read_count
     * @property Show\Field|Collection topic_id
     * @property Show\Field|Collection aliyun
     * @property Show\Field|Collection qcloud
     * @property Show\Field|Collection qiniu
     * @property Show\Field|Collection storage_type
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection file_name
     * @property Show\Field|Collection file_url
     * @property Show\Field|Collection group_id
     * @property Show\Field|Collection img_height
     * @property Show\Field|Collection img_width
     * @property Show\Field|Collection size
     * @property Show\Field|Collection app_source
     * @property Show\Field|Collection apple_openid
     * @property Show\Field|Collection avatar_url
     * @property Show\Field|Collection binding
     * @property Show\Field|Collection blacklist
     * @property Show\Field|Collection clientid
     * @property Show\Field|Collection comments
     * @property Show\Field|Collection contact_way
     * @property Show\Field|Collection is_app
     * @property Show\Field|Collection is_clerk
     * @property Show\Field|Collection is_distributor
     * @property Show\Field|Collection is_web
     * @property Show\Field|Collection parent_user_id
     * @property Show\Field|Collection saas_id
     * @property Show\Field|Collection total_integral
     * @property Show\Field|Collection wechat_platform_open_id
     * @property Show\Field|Collection wechat_union_id
     * @property Show\Field|Collection is_pass
     * @property Show\Field|Collection card_content
     * @property Show\Field|Collection card_name
     * @property Show\Field|Collection card_pic_url
     * @property Show\Field|Collection clerk_time
     * @property Show\Field|Collection is_use
     * @property Show\Field|Collection surplus
     * @property Show\Field|Collection coupon_auto_send_id
     * @property Show\Field|Collection mode_value
     * @property Show\Field|Collection times
     * @property Show\Field|Collection after_change
     * @property Show\Field|Collection before_change
     * @property Show\Field|Collection is_consumer_card
     * @property Show\Field|Collection key_name
     * @property Show\Field|Collection pasttime
     * @property Show\Field|Collection role_tab
     * @property Show\Field|Collection use_dis
     * @property Show\Field|Collection usetime
     * @property Show\Field|Collection vcd_sort
     * @property Show\Field|Collection vr_cat
     * @property Show\Field|Collection key_salt
     * @property Show\Field|Collection role_cont
     * @property Show\Field|Collection use_order
     * @property Show\Field|Collection use_uid
     * @property Show\Field|Collection vcd_id
     * @property Show\Field|Collection vcl_sort
     * @property Show\Field|Collection examine_msg
     * @property Show\Field|Collection app_secret
     * @property Show\Field|Collection cert_pem
     * @property Show\Field|Collection key_pem
     * @property Show\Field|Collection original_id
     * @property Show\Field|Collection uni_app_id
     * @property Show\Field|Collection web_app_id
     * @property Show\Field|Collection web_app_secret
     * @property Show\Field|Collection api_key
     * @property Show\Field|Collection apiv3_key
     * @property Show\Field|Collection platform_cert_date
     * @property Show\Field|Collection platform_cert_pem
     * @property Show\Field|Collection platform_serial_no
     * @property Show\Field|Collection serial_no
     * @property Show\Field|Collection not_pay_tpl
     * @property Show\Field|Collection pay_tpl
     * @property Show\Field|Collection refund_tpl
     * @property Show\Field|Collection revoke_tpl
     * @property Show\Field|Collection send_tpl
     * @property Show\Field|Collection create_comment_tab
     * @property Show\Field|Collection create_goods_tab
     * @property Show\Field|Collection create_like_tab
     * @property Show\Field|Collection feeds_img
     * @property Show\Field|Collection feeds_img_link
     * @property Show\Field|Collection goods_list
     * @property Show\Field|Collection live_backimg
     * @property Show\Field|Collection live_backimg_link
     * @property Show\Field|Collection live_nickname
     * @property Show\Field|Collection live_size
     * @property Show\Field|Collection live_title
     * @property Show\Field|Collection live_type
     * @property Show\Field|Collection notice_url
     * @property Show\Field|Collection push_url
     * @property Show\Field|Collection res_desc
     * @property Show\Field|Collection room_id
     * @property Show\Field|Collection share_img
     * @property Show\Field|Collection share_img_link
     * @property Show\Field|Collection wx_account
     * @property Show\Field|Collection wxll_desc
     * @property Show\Field|Collection audit_id
     * @property Show\Field|Collection cover_img_url
     * @property Show\Field|Collection end_price
     * @property Show\Field|Collection jump_url
     * @property Show\Field|Collection start_price
     * @property Show\Field|Collection third_party_tag
     * @property Show\Field|Collection wx_goods_id
     * @property Show\Field|Collection anchor_name
     * @property Show\Field|Collection goods
     * @property Show\Field|Collection goods_shelves
     * @property Show\Field|Collection is_pull_replay
     * @property Show\Field|Collection live_status
     * @property Show\Field|Collection roomid
     * @property Show\Field|Collection wx_goods_ids
     * @property Show\Field|Collection media_url
     * @property Show\Field|Collection is_refund
     * @property Show\Field|Collection refund_time
     * @property Show\Field|Collection use_time
     * @property Show\Field|Collection cat
     * @property Show\Field|Collection refund_notice
     * @property Show\Field|Collection success_notice
     * @property Show\Field|Collection consigneeAddress
     * @property Show\Field|Collection consigneeMobile
     * @property Show\Field|Collection consigneeName
     * @property Show\Field|Collection creatorMobile
     * @property Show\Field|Collection creatorName
     * @property Show\Field|Collection creatorOrgName
     * @property Show\Field|Collection invoiceAddress
     * @property Show\Field|Collection invoiceTitle
     * @property Show\Field|Collection invoiceType
     * @property Show\Field|Collection itins
     * @property Show\Field|Collection payOrgName
     * @property Show\Field|Collection telephone
     * @property Show\Field|Collection yc_order_no
     * @property Show\Field|Collection zycg_url
     * @property Show\Field|Collection discountRate
     * @property Show\Field|Collection colour
     * @property Show\Field|Collection rate
     * @property Show\Field|Collection companyCustNo
     * @property Show\Field|Collection invoiceAccount
     * @property Show\Field|Collection invoiceAddr
     * @property Show\Field|Collection invoiceBank
     * @property Show\Field|Collection invoiceContent
     * @property Show\Field|Collection orderId
     * @property Show\Field|Collection orderType
     * @property Show\Field|Collection receiverName
     * @property Show\Field|Collection servFee
     * @property Show\Field|Collection taxno
     * @property Show\Field|Collection tradeNo
     * @property Show\Field|Collection region_id
     * @property Show\Field|Collection region_name
     * @property Show\Field|Collection region_type
     * @property Show\Field|Collection zzds_url
     *
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection alias(string $label = null)
     * @method Show\Field|Collection authors(string $label = null)
     * @method Show\Field|Collection enable(string $label = null)
     * @method Show\Field|Collection imported(string $label = null)
     * @method Show\Field|Collection config(string $label = null)
     * @method Show\Field|Collection require(string $label = null)
     * @method Show\Field|Collection require_dev(string $label = null)
     * @method Show\Field|Collection width(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection img_url(string $label = null)
     * @method Show\Field|Collection position(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection uid(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection input(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection is_del(string $label = null)
     * @method Show\Field|Collection pidcard(string $label = null)
     * @method Show\Field|Collection pname(string $label = null)
     * @method Show\Field|Collection pphone(string $label = null)
     * @method Show\Field|Collection company_code(string $label = null)
     * @method Show\Field|Collection contact_name(string $label = null)
     * @method Show\Field|Collection contact_tel(string $label = null)
     * @method Show\Field|Collection date(string $label = null)
     * @method Show\Field|Collection flight_no(string $label = null)
     * @method Show\Field|Collection from(string $label = null)
     * @method Show\Field|Collection item_id(string $label = null)
     * @method Show\Field|Collection order_no(string $label = null)
     * @method Show\Field|Collection passagers(string $label = null)
     * @method Show\Field|Collection pay_channel(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection seat_code(string $label = null)
     * @method Show\Field|Collection to(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection assets_name(string $label = null)
     * @method Show\Field|Collection assets_type_id(string $label = null)
     * @method Show\Field|Collection change_times(string $label = null)
     * @method Show\Field|Collection freeze_amount(string $label = null)
     * @method Show\Field|Collection amount_before_change(string $label = null)
     * @method Show\Field|Collection operate_type(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection tx_hash(string $label = null)
     * @method Show\Field|Collection user_agent(string $label = null)
     * @method Show\Field|Collection can_withdraw(string $label = null)
     * @method Show\Field|Collection contract_address(string $label = null)
     * @method Show\Field|Collection large_withdraw_amount(string $label = null)
     * @method Show\Field|Collection recharge_status(string $label = null)
     * @method Show\Field|Collection withdraw_fee(string $label = null)
     * @method Show\Field|Collection id_card(string $label = null)
     * @method Show\Field|Collection id_card_img(string $label = null)
     * @method Show\Field|Collection id_card_people_img(string $label = null)
     * @method Show\Field|Collection msg(string $label = null)
     * @method Show\Field|Collection reason(string $label = null)
     * @method Show\Field|Collection img(string $label = null)
     * @method Show\Field|Collection img2(string $label = null)
     * @method Show\Field|Collection img_details1(string $label = null)
     * @method Show\Field|Collection img_details2(string $label = null)
     * @method Show\Field|Collection img_details3(string $label = null)
     * @method Show\Field|Collection phone(string $label = null)
     * @method Show\Field|Collection work(string $label = null)
     * @method Show\Field|Collection sort(string $label = null)
     * @method Show\Field|Collection banners(string $label = null)
     * @method Show\Field|Collection business_apply_id(string $label = null)
     * @method Show\Field|Collection category_id(string $label = null)
     * @method Show\Field|Collection city(string $label = null)
     * @method Show\Field|Collection contact_number(string $label = null)
     * @method Show\Field|Collection district(string $label = null)
     * @method Show\Field|Collection is_recommend(string $label = null)
     * @method Show\Field|Collection is_status(string $label = null)
     * @method Show\Field|Collection lg(string $label = null)
     * @method Show\Field|Collection limit_price(string $label = null)
     * @method Show\Field|Collection lt(string $label = null)
     * @method Show\Field|Collection main_business(string $label = null)
     * @method Show\Field|Collection province(string $label = null)
     * @method Show\Field|Collection run_time(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection code(string $label = null)
     * @method Show\Field|Collection p_code(string $label = null)
     * @method Show\Field|Collection new_user_number(string $label = null)
     * @method Show\Field|Collection total_consumption(string $label = null)
     * @method Show\Field|Collection user_active(string $label = null)
     * @method Show\Field|Collection user_number(string $label = null)
     * @method Show\Field|Collection yesterday_consumption(string $label = null)
     * @method Show\Field|Collection oid(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection usdt_amount(string $label = null)
     * @method Show\Field|Collection user_name(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection activityState(string $label = null)
     * @method Show\Field|Collection consumer_uid(string $label = null)
     * @method Show\Field|Collection role(string $label = null)
     * @method Show\Field|Collection business_uid(string $label = null)
     * @method Show\Field|Collection is_confirm(string $label = null)
     * @method Show\Field|Collection profit_price(string $label = null)
     * @method Show\Field|Collection profit_ratio(string $label = null)
     * @method Show\Field|Collection shop_order_id(string $label = null)
     * @method Show\Field|Collection order_id(string $label = null)
     * @method Show\Field|Collection submenu(string $label = null)
     * @method Show\Field|Collection cat_id(string $label = null)
     * @method Show\Field|Collection data(string $label = null)
     * @method Show\Field|Collection error(string $label = null)
     * @method Show\Field|Collection log(string $label = null)
     * @method Show\Field|Collection import_day(string $label = null)
     * @method Show\Field|Collection line_up(string $label = null)
     * @method Show\Field|Collection member_gl_oid(string $label = null)
     * @method Show\Field|Collection pay_status(string $label = null)
     * @method Show\Field|Collection to_be_added_integral(string $label = null)
     * @method Show\Field|Collection to_status(string $label = null)
     * @method Show\Field|Collection order_nos(string $label = null)
     * @method Show\Field|Collection return_type(string $label = null)
     * @method Show\Field|Collection trade_no(string $label = null)
     * @method Show\Field|Collection aid(string $label = null)
     * @method Show\Field|Collection bill_state(string $label = null)
     * @method Show\Field|Collection bill_time(string $label = null)
     * @method Show\Field|Collection ctime(string $label = null)
     * @method Show\Field|Collection etime(string $label = null)
     * @method Show\Field|Collection idcard_no(string $label = null)
     * @method Show\Field|Collection idcard_type(string $label = null)
     * @method Show\Field|Collection legs(string $label = null)
     * @method Show\Field|Collection order_state(string $label = null)
     * @method Show\Field|Collection order_type(string $label = null)
     * @method Show\Field|Collection other_fee(string $label = null)
     * @method Show\Field|Collection passenger_name(string $label = null)
     * @method Show\Field|Collection passenger_tel(string $label = null)
     * @method Show\Field|Collection pay_cash(string $label = null)
     * @method Show\Field|Collection recevie_station(string $label = null)
     * @method Show\Field|Collection refund_fee(string $label = null)
     * @method Show\Field|Collection seat_type(string $label = null)
     * @method Show\Field|Collection start_station(string $label = null)
     * @method Show\Field|Collection start_time(string $label = null)
     * @method Show\Field|Collection ticket_no(string $label = null)
     * @method Show\Field|Collection total_face_price(string $label = null)
     * @method Show\Field|Collection total_other_fee(string $label = null)
     * @method Show\Field|Collection total_pay_cash(string $label = null)
     * @method Show\Field|Collection total_refund_amount(string $label = null)
     * @method Show\Field|Collection train_no(string $label = null)
     * @method Show\Field|Collection utime(string $label = null)
     * @method Show\Field|Collection child_ages(string $label = null)
     * @method Show\Field|Collection child_num(string $label = null)
     * @method Show\Field|Collection contact_email(string $label = null)
     * @method Show\Field|Collection contact_phone(string $label = null)
     * @method Show\Field|Collection customer_arrive_time(string $label = null)
     * @method Show\Field|Collection customer_name(string $label = null)
     * @method Show\Field|Collection goods_title(string $label = null)
     * @method Show\Field|Collection hotel_id(string $label = null)
     * @method Show\Field|Collection in_date(string $label = null)
     * @method Show\Field|Collection man(string $label = null)
     * @method Show\Field|Collection money(string $label = null)
     * @method Show\Field|Collection out_date(string $label = null)
     * @method Show\Field|Collection special_remarks(string $label = null)
     * @method Show\Field|Collection count_lk(string $label = null)
     * @method Show\Field|Collection count_profit_price(string $label = null)
     * @method Show\Field|Collection day(string $label = null)
     * @method Show\Field|Collection dr_count(string $label = null)
     * @method Show\Field|Collection other_price(string $label = null)
     * @method Show\Field|Collection price_10(string $label = null)
     * @method Show\Field|Collection price_20(string $label = null)
     * @method Show\Field|Collection price_5(string $label = null)
     * @method Show\Field|Collection switch(string $label = null)
     * @method Show\Field|Collection create_type(string $label = null)
     * @method Show\Field|Collection has_child(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection num(string $label = null)
     * @method Show\Field|Collection order_mobile_id(string $label = null)
     * @method Show\Field|Collection account(string $label = null)
     * @method Show\Field|Collection balance(string $label = null)
     * @method Show\Field|Collection bill_cycle(string $label = null)
     * @method Show\Field|Collection content_id(string $label = null)
     * @method Show\Field|Collection contract_no(string $label = null)
     * @method Show\Field|Collection item4(string $label = null)
     * @method Show\Field|Collection pay_amount(string $label = null)
     * @method Show\Field|Collection penalty(string $label = null)
     * @method Show\Field|Collection prepaid_flag(string $label = null)
     * @method Show\Field|Collection card_list(string $label = null)
     * @method Show\Field|Collection channel(string $label = null)
     * @method Show\Field|Collection created_time(string $label = null)
     * @method Show\Field|Collection end_time(string $label = null)
     * @method Show\Field|Collection out_trans_id(string $label = null)
     * @method Show\Field|Collection party_order_id(string $label = null)
     * @method Show\Field|Collection pay_amt(string $label = null)
     * @method Show\Field|Collection pid(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection img_back(string $label = null)
     * @method Show\Field|Collection img_just(string $label = null)
     * @method Show\Field|Collection num_id(string $label = null)
     * @method Show\Field|Collection second(string $label = null)
     * @method Show\Field|Collection business(string $label = null)
     * @method Show\Field|Collection business_lk_iets(string $label = null)
     * @method Show\Field|Collection consumer(string $label = null)
     * @method Show\Field|Collection consumer_lk_iets(string $label = null)
     * @method Show\Field|Collection join_business(string $label = null)
     * @method Show\Field|Collection join_consumer(string $label = null)
     * @method Show\Field|Collection market(string $label = null)
     * @method Show\Field|Collection new_business(string $label = null)
     * @method Show\Field|Collection people(string $label = null)
     * @method Show\Field|Collection platform(string $label = null)
     * @method Show\Field|Collection share(string $label = null)
     * @method Show\Field|Collection welfare(string $label = null)
     * @method Show\Field|Collection reorder_id(string $label = null)
     * @method Show\Field|Collection key(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection is_add_points(string $label = null)
     * @method Show\Field|Collection sign_date(string $label = null)
     * @method Show\Field|Collection total_num(string $label = null)
     * @method Show\Field|Collection yx_uid(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection integral(string $label = null)
     * @method Show\Field|Collection modified_time(string $label = null)
     * @method Show\Field|Collection need_fee(string $label = null)
     * @method Show\Field|Collection numeric(string $label = null)
     * @method Show\Field|Collection order_from(string $label = null)
     * @method Show\Field|Collection pay_time(string $label = null)
     * @method Show\Field|Collection remarks(string $label = null)
     * @method Show\Field|Collection telecom(string $label = null)
     * @method Show\Field|Collection admin_id(string $label = null)
     * @method Show\Field|Collection assets_id(string $label = null)
     * @method Show\Field|Collection assets_type(string $label = null)
     * @method Show\Field|Collection block_hash(string $label = null)
     * @method Show\Field|Collection block_number(string $label = null)
     * @method Show\Field|Collection data_id(string $label = null)
     * @method Show\Field|Collection deal_type(string $label = null)
     * @method Show\Field|Collection gas_price(string $label = null)
     * @method Show\Field|Collection hash(string $label = null)
     * @method Show\Field|Collection payee(string $label = null)
     * @method Show\Field|Collection token_tx_amount(string $label = null)
     * @method Show\Field|Collection tx_status(string $label = null)
     * @method Show\Field|Collection access_token(string $label = null)
     * @method Show\Field|Collection alipay_alipay_user_id(string $label = null)
     * @method Show\Field|Collection alipay_user_id(string $label = null)
     * @method Show\Field|Collection app_id(string $label = null)
     * @method Show\Field|Collection auth_code(string $label = null)
     * @method Show\Field|Collection expires_in(string $label = null)
     * @method Show\Field|Collection is_used(string $label = null)
     * @method Show\Field|Collection re_expires_in(string $label = null)
     * @method Show\Field|Collection refresh_token(string $label = null)
     * @method Show\Field|Collection scope(string $label = null)
     * @method Show\Field|Collection source(string $label = null)
     * @method Show\Field|Collection change_address_time(string $label = null)
     * @method Show\Field|Collection change_password_ip(string $label = null)
     * @method Show\Field|Collection change_password_time(string $label = null)
     * @method Show\Field|Collection last_ip(string $label = null)
     * @method Show\Field|Collection last_login(string $label = null)
     * @method Show\Field|Collection img_hold(string $label = null)
     * @method Show\Field|Collection money_before_change(string $label = null)
     * @method Show\Field|Collection sys_mid(string $label = null)
     * @method Show\Field|Collection edit_to_phone(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection alipay_account(string $label = null)
     * @method Show\Field|Collection alipay_avatar(string $label = null)
     * @method Show\Field|Collection alipay_nickname(string $label = null)
     * @method Show\Field|Collection balance_allowance(string $label = null)
     * @method Show\Field|Collection balance_consume(string $label = null)
     * @method Show\Field|Collection balance_tuan(string $label = null)
     * @method Show\Field|Collection ban_reason(string $label = null)
     * @method Show\Field|Collection birth(string $label = null)
     * @method Show\Field|Collection business_integral(string $label = null)
     * @method Show\Field|Collection business_lk(string $label = null)
     * @method Show\Field|Collection code_invite(string $label = null)
     * @method Show\Field|Collection invite_uid(string $label = null)
     * @method Show\Field|Collection is_auth(string $label = null)
     * @method Show\Field|Collection lk(string $label = null)
     * @method Show\Field|Collection market_business(string $label = null)
     * @method Show\Field|Collection member_head(string $label = null)
     * @method Show\Field|Collection member_status(string $label = null)
     * @method Show\Field|Collection real_name(string $label = null)
     * @method Show\Field|Collection return_business_integral(string $label = null)
     * @method Show\Field|Collection return_integral(string $label = null)
     * @method Show\Field|Collection return_lk(string $label = null)
     * @method Show\Field|Collection salt(string $label = null)
     * @method Show\Field|Collection sex(string $label = null)
     * @method Show\Field|Collection shop_uid(string $label = null)
     * @method Show\Field|Collection sign(string $label = null)
     * @method Show\Field|Collection expires_at(string $label = null)
     * @method Show\Field|Collection used(string $label = null)
     * @method Show\Field|Collection actual_amount(string $label = null)
     * @method Show\Field|Collection alipay_status(string $label = null)
     * @method Show\Field|Collection balance_fee(string $label = null)
     * @method Show\Field|Collection balance_type(string $label = null)
     * @method Show\Field|Collection failed_reason(string $label = null)
     * @method Show\Field|Collection handling_price(string $label = null)
     * @method Show\Field|Collection handling_ratio(string $label = null)
     * @method Show\Field|Collection out_trade_no(string $label = null)
     * @method Show\Field|Collection pay_fund_order_id(string $label = null)
     * @method Show\Field|Collection trans_date(string $label = null)
     * @method Show\Field|Collection fee(string $label = null)
     * @method Show\Field|Collection action_type(string $label = null)
     * @method Show\Field|Collection addtime(string $label = null)
     * @method Show\Field|Collection admin_ip(string $label = null)
     * @method Show\Field|Collection admin_name(string $label = null)
     * @method Show\Field|Collection is_delete(string $label = null)
     * @method Show\Field|Collection obj_id(string $label = null)
     * @method Show\Field|Collection result(string $label = null)
     * @method Show\Field|Collection route(string $label = null)
     * @method Show\Field|Collection store_id(string $label = null)
     * @method Show\Field|Collection create_time(string $label = null)
     * @method Show\Field|Collection unit_id(string $label = null)
     * @method Show\Field|Collection alibaba_json(string $label = null)
     * @method Show\Field|Collection city_id(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection district_id(string $label = null)
     * @method Show\Field|Collection is_default(string $label = null)
     * @method Show\Field|Collection lat(string $label = null)
     * @method Show\Field|Collection lng(string $label = null)
     * @method Show\Field|Collection province_id(string $label = null)
     * @method Show\Field|Collection app_max_count(string $label = null)
     * @method Show\Field|Collection auth_key(string $label = null)
     * @method Show\Field|Collection expire_time(string $label = null)
     * @method Show\Field|Collection permission(string $label = null)
     * @method Show\Field|Collection display_name(string $label = null)
     * @method Show\Field|Collection desc(string $label = null)
     * @method Show\Field|Collection alias_name(string $label = null)
     * @method Show\Field|Collection alipay_logon_id(string $label = null)
     * @method Show\Field|Collection binding_alipay_logon_id(string $label = null)
     * @method Show\Field|Collection biz_cards(string $label = null)
     * @method Show\Field|Collection business_address(string $label = null)
     * @method Show\Field|Collection cert_image(string $label = null)
     * @method Show\Field|Collection cert_image_back(string $label = null)
     * @method Show\Field|Collection cert_name(string $label = null)
     * @method Show\Field|Collection cert_no(string $label = null)
     * @method Show\Field|Collection cert_type(string $label = null)
     * @method Show\Field|Collection contact_infos(string $label = null)
     * @method Show\Field|Collection default_settle_rule(string $label = null)
     * @method Show\Field|Collection external_id(string $label = null)
     * @method Show\Field|Collection invoice_info(string $label = null)
     * @method Show\Field|Collection legal_cert_back_image(string $label = null)
     * @method Show\Field|Collection legal_cert_front_image(string $label = null)
     * @method Show\Field|Collection legal_cert_no(string $label = null)
     * @method Show\Field|Collection legal_cert_type(string $label = null)
     * @method Show\Field|Collection legal_name(string $label = null)
     * @method Show\Field|Collection license_auth_letter_image(string $label = null)
     * @method Show\Field|Collection mcc(string $label = null)
     * @method Show\Field|Collection mch_id(string $label = null)
     * @method Show\Field|Collection merchant_type(string $label = null)
     * @method Show\Field|Collection out_door_images(string $label = null)
     * @method Show\Field|Collection qualifications(string $label = null)
     * @method Show\Field|Collection service(string $label = null)
     * @method Show\Field|Collection service_phone(string $label = null)
     * @method Show\Field|Collection sign_time_with_isv(string $label = null)
     * @method Show\Field|Collection sites(string $label = null)
     * @method Show\Field|Collection smid(string $label = null)
     * @method Show\Field|Collection article_cat_id(string $label = null)
     * @method Show\Field|Collection add_time(string $label = null)
     * @method Show\Field|Collection is_bottom(string $label = null)
     * @method Show\Field|Collection is_show(string $label = null)
     * @method Show\Field|Collection attr_group_id(string $label = null)
     * @method Show\Field|Collection attr_name(string $label = null)
     * @method Show\Field|Collection attr_group_name(string $label = null)
     * @method Show\Field|Collection creator_id(string $label = null)
     * @method Show\Field|Collection permission_name(string $label = null)
     * @method Show\Field|Collection open_type(string $label = null)
     * @method Show\Field|Collection page_url(string $label = null)
     * @method Show\Field|Collection pic_url(string $label = null)
     * @method Show\Field|Collection skip_url(string $label = null)
     * @method Show\Field|Collection begin_time(string $label = null)
     * @method Show\Field|Collection goods_id(string $label = null)
     * @method Show\Field|Collection min_price(string $label = null)
     * @method Show\Field|Collection status_data(string $label = null)
     * @method Show\Field|Collection attr(string $label = null)
     * @method Show\Field|Collection original_price(string $label = null)
     * @method Show\Field|Collection is_mail(string $label = null)
     * @method Show\Field|Collection is_print(string $label = null)
     * @method Show\Field|Collection is_share(string $label = null)
     * @method Show\Field|Collection is_sms(string $label = null)
     * @method Show\Field|Collection share_title(string $label = null)
     * @method Show\Field|Collection initials(string $label = null)
     * @method Show\Field|Collection pinyin(string $label = null)
     * @method Show\Field|Collection parts_id(string $label = null)
     * @method Show\Field|Collection bank_name(string $label = null)
     * @method Show\Field|Collection pay_type(string $label = null)
     * @method Show\Field|Collection service_charge(string $label = null)
     * @method Show\Field|Collection advert_pic(string $label = null)
     * @method Show\Field|Collection advert_url(string $label = null)
     * @method Show\Field|Collection big_pic_url(string $label = null)
     * @method Show\Field|Collection pc_advert_url(string $label = null)
     * @method Show\Field|Collection pc_icon(string $label = null)
     * @method Show\Field|Collection seo_desc(string $label = null)
     * @method Show\Field|Collection seo_keyword(string $label = null)
     * @method Show\Field|Collection subtitle(string $label = null)
     * @method Show\Field|Collection color(string $label = null)
     * @method Show\Field|Collection rgb(string $label = null)
     * @method Show\Field|Collection is_expire(string $label = null)
     * @method Show\Field|Collection key_val(string $label = null)
     * @method Show\Field|Collection sur_price(string $label = null)
     * @method Show\Field|Collection total_price(string $label = null)
     * @method Show\Field|Collection vd_id(string $label = null)
     * @method Show\Field|Collection vl_id(string $label = null)
     * @method Show\Field|Collection appoint_type(string $label = null)
     * @method Show\Field|Collection cat_id_list(string $label = null)
     * @method Show\Field|Collection discount(string $label = null)
     * @method Show\Field|Collection discount_type(string $label = null)
     * @method Show\Field|Collection expire_day(string $label = null)
     * @method Show\Field|Collection expire_type(string $label = null)
     * @method Show\Field|Collection goods_id_list(string $label = null)
     * @method Show\Field|Collection is_integral(string $label = null)
     * @method Show\Field|Collection is_join(string $label = null)
     * @method Show\Field|Collection rule(string $label = null)
     * @method Show\Field|Collection sub_price(string $label = null)
     * @method Show\Field|Collection total_count(string $label = null)
     * @method Show\Field|Collection user_num(string $label = null)
     * @method Show\Field|Collection coupon_id(string $label = null)
     * @method Show\Field|Collection event(string $label = null)
     * @method Show\Field|Collection send_times(string $label = null)
     * @method Show\Field|Collection customer_pwd(string $label = null)
     * @method Show\Field|Collection express_id(string $label = null)
     * @method Show\Field|Collection month_code(string $label = null)
     * @method Show\Field|Collection send_name(string $label = null)
     * @method Show\Field|Collection send_site(string $label = null)
     * @method Show\Field|Collection template_size(string $label = null)
     * @method Show\Field|Collection adverse_distribution(string $label = null)
     * @method Show\Field|Collection adverse_kilometres(string $label = null)
     * @method Show\Field|Collection adverse_lat_and_lon(string $label = null)
     * @method Show\Field|Collection adverse_money(string $label = null)
     * @method Show\Field|Collection lat_and_lon(string $label = null)
     * @method Show\Field|Collection order_time(string $label = null)
     * @method Show\Field|Collection routine_distribution(string $label = null)
     * @method Show\Field|Collection routine_kilometres(string $label = null)
     * @method Show\Field|Collection routine_money(string $label = null)
     * @method Show\Field|Collection adcode(string $label = null)
     * @method Show\Field|Collection citycode(string $label = null)
     * @method Show\Field|Collection level(string $label = null)
     * @method Show\Field|Collection is_index(string $label = null)
     * @method Show\Field|Collection template_id(string $label = null)
     * @method Show\Field|Collection template(string $label = null)
     * @method Show\Field|Collection default(string $label = null)
     * @method Show\Field|Collection required(string $label = null)
     * @method Show\Field|Collection tip(string $label = null)
     * @method Show\Field|Collection form_id(string $label = null)
     * @method Show\Field|Collection is_usable(string $label = null)
     * @method Show\Field|Collection send_count(string $label = null)
     * @method Show\Field|Collection transaction_id(string $label = null)
     * @method Show\Field|Collection wechat_open_id(string $label = null)
     * @method Show\Field|Collection coupon_expire(string $label = null)
     * @method Show\Field|Collection coupon_money(string $label = null)
     * @method Show\Field|Collection coupon_total_money(string $label = null)
     * @method Show\Field|Collection coupon_use_minimum(string $label = null)
     * @method Show\Field|Collection distribute_type(string $label = null)
     * @method Show\Field|Collection is_finish(string $label = null)
     * @method Show\Field|Collection game_open(string $label = null)
     * @method Show\Field|Collection game_time(string $label = null)
     * @method Show\Field|Collection share_pic(string $label = null)
     * @method Show\Field|Collection tpl_msg_id(string $label = null)
     * @method Show\Field|Collection after_sales_id(string $label = null)
     * @method Show\Field|Collection attr_setting_type(string $label = null)
     * @method Show\Field|Collection auto_send(string $label = null)
     * @method Show\Field|Collection auto_vr_cont(string $label = null)
     * @method Show\Field|Collection brand_id(string $label = null)
     * @method Show\Field|Collection card_data(string $label = null)
     * @method Show\Field|Collection confine_count(string $label = null)
     * @method Show\Field|Collection cost_price(string $label = null)
     * @method Show\Field|Collection cover_pic(string $label = null)
     * @method Show\Field|Collection freight(string $label = null)
     * @method Show\Field|Collection full_cut(string $label = null)
     * @method Show\Field|Collection goods_num(string $label = null)
     * @method Show\Field|Collection hot_cakes(string $label = null)
     * @method Show\Field|Collection individual_share(string $label = null)
     * @method Show\Field|Collection is_best(string $label = null)
     * @method Show\Field|Collection is_examine(string $label = null)
     * @method Show\Field|Collection is_hot(string $label = null)
     * @method Show\Field|Collection is_lead(string $label = null)
     * @method Show\Field|Collection is_level(string $label = null)
     * @method Show\Field|Collection is_negotiable(string $label = null)
     * @method Show\Field|Collection is_recycle(string $label = null)
     * @method Show\Field|Collection is_spell(string $label = null)
     * @method Show\Field|Collection isSelf(string $label = null)
     * @method Show\Field|Collection label_id(string $label = null)
     * @method Show\Field|Collection lead_attr(string $label = null)
     * @method Show\Field|Collection lead_price(string $label = null)
     * @method Show\Field|Collection lead_type(string $label = null)
     * @method Show\Field|Collection market_increase(string $label = null)
     * @method Show\Field|Collection mch_is_best(string $label = null)
     * @method Show\Field|Collection mch_is_hot(string $label = null)
     * @method Show\Field|Collection mch_ratio(string $label = null)
     * @method Show\Field|Collection mch_sort(string $label = null)
     * @method Show\Field|Collection member_discount(string $label = null)
     * @method Show\Field|Collection osg_id(string $label = null)
     * @method Show\Field|Collection packing_id(string $label = null)
     * @method Show\Field|Collection payment(string $label = null)
     * @method Show\Field|Collection platform_ratio(string $label = null)
     * @method Show\Field|Collection price_increase(string $label = null)
     * @method Show\Field|Collection purchase_price(string $label = null)
     * @method Show\Field|Collection quick_purchase(string $label = null)
     * @method Show\Field|Collection rebate(string $label = null)
     * @method Show\Field|Collection share_commission_first(string $label = null)
     * @method Show\Field|Collection share_commission_second(string $label = null)
     * @method Show\Field|Collection share_commission_third(string $label = null)
     * @method Show\Field|Collection share_type(string $label = null)
     * @method Show\Field|Collection supplierLoginId(string $label = null)
     * @method Show\Field|Collection unit(string $label = null)
     * @method Show\Field|Collection use_attr(string $label = null)
     * @method Show\Field|Collection video_url(string $label = null)
     * @method Show\Field|Collection virtual_sales(string $label = null)
     * @method Show\Field|Collection vop_id(string $label = null)
     * @method Show\Field|Collection vr_type(string $label = null)
     * @method Show\Field|Collection wareQD(string $label = null)
     * @method Show\Field|Collection wares_id(string $label = null)
     * @method Show\Field|Collection wares_status(string $label = null)
     * @method Show\Field|Collection weight(string $label = null)
     * @method Show\Field|Collection click(string $label = null)
     * @method Show\Field|Collection card_id(string $label = null)
     * @method Show\Field|Collection goods_parts_id(string $label = null)
     * @method Show\Field|Collection relation_id(string $label = null)
     * @method Show\Field|Collection good_id(string $label = null)
     * @method Show\Field|Collection like_id(string $label = null)
     * @method Show\Field|Collection style(string $label = null)
     * @method Show\Field|Collection is_hide(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection is_virtual(string $label = null)
     * @method Show\Field|Collection order_detail_id(string $label = null)
     * @method Show\Field|Collection pic_list(string $label = null)
     * @method Show\Field|Collection reply_content(string $label = null)
     * @method Show\Field|Collection score(string $label = null)
     * @method Show\Field|Collection score_star(string $label = null)
     * @method Show\Field|Collection virtual_avatar(string $label = null)
     * @method Show\Field|Collection virtual_user(string $label = null)
     * @method Show\Field|Collection is_pay(string $label = null)
     * @method Show\Field|Collection goods_pic_list(string $label = null)
     * @method Show\Field|Collection explain(string $label = null)
     * @method Show\Field|Collection operator(string $label = null)
     * @method Show\Field|Collection operator_id(string $label = null)
     * @method Show\Field|Collection address_data(string $label = null)
     * @method Show\Field|Collection apply_delete(string $label = null)
     * @method Show\Field|Collection clerk_id(string $label = null)
     * @method Show\Field|Collection confirm_time(string $label = null)
     * @method Show\Field|Collection express(string $label = null)
     * @method Show\Field|Collection express_no(string $label = null)
     * @method Show\Field|Collection express_price(string $label = null)
     * @method Show\Field|Collection is_cancel(string $label = null)
     * @method Show\Field|Collection is_comment(string $label = null)
     * @method Show\Field|Collection is_offline(string $label = null)
     * @method Show\Field|Collection is_sale(string $label = null)
     * @method Show\Field|Collection is_send(string $label = null)
     * @method Show\Field|Collection offline_qrcode(string $label = null)
     * @method Show\Field|Collection pay_price(string $label = null)
     * @method Show\Field|Collection send_time(string $label = null)
     * @method Show\Field|Collection shop_id(string $label = null)
     * @method Show\Field|Collection words(string $label = null)
     * @method Show\Field|Collection goods_name(string $label = null)
     * @method Show\Field|Collection pay_integral(string $label = null)
     * @method Show\Field|Collection pic(string $label = null)
     * @method Show\Field|Collection integral_shuoming(string $label = null)
     * @method Show\Field|Collection register_continuation(string $label = null)
     * @method Show\Field|Collection register_integral(string $label = null)
     * @method Show\Field|Collection register_reward(string $label = null)
     * @method Show\Field|Collection register_rule(string $label = null)
     * @method Show\Field|Collection taxpayer(string $label = null)
     * @method Show\Field|Collection totalprice(string $label = null)
     * @method Show\Field|Collection skuId(string $label = null)
     * @method Show\Field|Collection cn_name(string $label = null)
     * @method Show\Field|Collection en_name(string $label = null)
     * @method Show\Field|Collection cat_num(string $label = null)
     * @method Show\Field|Collection categoryAttr(string $label = null)
     * @method Show\Field|Collection param(string $label = null)
     * @method Show\Field|Collection saleAttr(string $label = null)
     * @method Show\Field|Collection attr_json(string $label = null)
     * @method Show\Field|Collection cat_attr_id(string $label = null)
     * @method Show\Field|Collection cat_name(string $label = null)
     * @method Show\Field|Collection goods_no(string $label = null)
     * @method Show\Field|Collection is_upsert(string $label = null)
     * @method Show\Field|Collection isEnergySav(string $label = null)
     * @method Show\Field|Collection isEnvironmental(string $label = null)
     * @method Show\Field|Collection packing_list(string $label = null)
     * @method Show\Field|Collection taxCode(string $label = null)
     * @method Show\Field|Collection taxInfo(string $label = null)
     * @method Show\Field|Collection addTime(string $label = null)
     * @method Show\Field|Collection thirdSkuId(string $label = null)
     * @method Show\Field|Collection typeMsg(string $label = null)
     * @method Show\Field|Collection cancel_status(string $label = null)
     * @method Show\Field|Collection cityId(string $label = null)
     * @method Show\Field|Collection countyId(string $label = null)
     * @method Show\Field|Collection invoiceState(string $label = null)
     * @method Show\Field|Collection is_true(string $label = null)
     * @method Show\Field|Collection jjys_order_no(string $label = null)
     * @method Show\Field|Collection provinceId(string $label = null)
     * @method Show\Field|Collection submitStatus(string $label = null)
     * @method Show\Field|Collection townId(string $label = null)
     * @method Show\Field|Collection zip(string $label = null)
     * @method Show\Field|Collection jjys_url(string $label = null)
     * @method Show\Field|Collection purch_appkey(string $label = null)
     * @method Show\Field|Collection purch_appsecret(string $label = null)
     * @method Show\Field|Collection purch_suppliercode(string $label = null)
     * @method Show\Field|Collection supplier_appid(string $label = null)
     * @method Show\Field|Collection supplier_appkey(string $label = null)
     * @method Show\Field|Collection supplier_appsecret(string $label = null)
     * @method Show\Field|Collection buy_prompt(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection level_image(string $label = null)
     * @method Show\Field|Collection synopsis(string $label = null)
     * @method Show\Field|Collection after_level(string $label = null)
     * @method Show\Field|Collection current_level(string $label = null)
     * @method Show\Field|Collection icon_url(string $label = null)
     * @method Show\Field|Collection actype(string $label = null)
     * @method Show\Field|Collection describe(string $label = null)
     * @method Show\Field|Collection follow_num(string $label = null)
     * @method Show\Field|Collection front_img(string $label = null)
     * @method Show\Field|Collection head_img(string $label = null)
     * @method Show\Field|Collection idcard(string $label = null)
     * @method Show\Field|Collection is_recom(string $label = null)
     * @method Show\Field|Collection live_power(string $label = null)
     * @method Show\Field|Collection live_price(string $label = null)
     * @method Show\Field|Collection max_goods(string $label = null)
     * @method Show\Field|Collection nickname(string $label = null)
     * @method Show\Field|Collection real_tel(string $label = null)
     * @method Show\Field|Collection rect_time(string $label = null)
     * @method Show\Field|Collection refuse_desc(string $label = null)
     * @method Show\Field|Collection anchor_id(string $label = null)
     * @method Show\Field|Collection refund_desc(string $label = null)
     * @method Show\Field|Collection unumber(string $label = null)
     * @method Show\Field|Collection goods_type(string $label = null)
     * @method Show\Field|Collection back_img(string $label = null)
     * @method Show\Field|Collection comment_num(string $label = null)
     * @method Show\Field|Collection cover_img(string $label = null)
     * @method Show\Field|Collection endtime(string $label = null)
     * @method Show\Field|Collection fict_like(string $label = null)
     * @method Show\Field|Collection fict_watch(string $label = null)
     * @method Show\Field|Collection get_past(string $label = null)
     * @method Show\Field|Collection like_num(string $label = null)
     * @method Show\Field|Collection play_addr(string $label = null)
     * @method Show\Field|Collection push_addr(string $label = null)
     * @method Show\Field|Collection real_endtime(string $label = null)
     * @method Show\Field|Collection real_starttime(string $label = null)
     * @method Show\Field|Collection sale_goods(string $label = null)
     * @method Show\Field|Collection starttime(string $label = null)
     * @method Show\Field|Collection un_key(string $label = null)
     * @method Show\Field|Collection watch_num(string $label = null)
     * @method Show\Field|Collection cs_drawing(string $label = null)
     * @method Show\Field|Collection cs_overtime(string $label = null)
     * @method Show\Field|Collection cs_setting(string $label = null)
     * @method Show\Field|Collection cs_tips(string $label = null)
     * @method Show\Field|Collection cs_type(string $label = null)
     * @method Show\Field|Collection least_money(string $label = null)
     * @method Show\Field|Collection money_comm(string $label = null)
     * @method Show\Field|Collection upper_money(string $label = null)
     * @method Show\Field|Collection stock(string $label = null)
     * @method Show\Field|Collection update_time(string $label = null)
     * @method Show\Field|Collection child_id(string $label = null)
     * @method Show\Field|Collection lottery_id(string $label = null)
     * @method Show\Field|Collection lucky_code(string $label = null)
     * @method Show\Field|Collection obtain_time(string $label = null)
     * @method Show\Field|Collection raffle_time(string $label = null)
     * @method Show\Field|Collection receive_mail(string $label = null)
     * @method Show\Field|Collection send_mail(string $label = null)
     * @method Show\Field|Collection send_pwd(string $label = null)
     * @method Show\Field|Collection account_money(string $label = null)
     * @method Show\Field|Collection account_type(string $label = null)
     * @method Show\Field|Collection alipay_account_name(string $label = null)
     * @method Show\Field|Collection choice_invoice(string $label = null)
     * @method Show\Field|Collection collection_app_key(string $label = null)
     * @method Show\Field|Collection fictitious_follow(string $label = null)
     * @method Show\Field|Collection header_bg(string $label = null)
     * @method Show\Field|Collection is_invoice(string $label = null)
     * @method Show\Field|Collection is_lock(string $label = null)
     * @method Show\Field|Collection is_open(string $label = null)
     * @method Show\Field|Collection is_popular(string $label = null)
     * @method Show\Field|Collection latitude(string $label = null)
     * @method Show\Field|Collection logo(string $label = null)
     * @method Show\Field|Collection longitude(string $label = null)
     * @method Show\Field|Collection main_content(string $label = null)
     * @method Show\Field|Collection mch_common_cat_id(string $label = null)
     * @method Show\Field|Collection mch_message(string $label = null)
     * @method Show\Field|Collection mch_money(string $label = null)
     * @method Show\Field|Collection mch_money_status(string $label = null)
     * @method Show\Field|Collection mch_type(string $label = null)
     * @method Show\Field|Collection o2o_cat_id(string $label = null)
     * @method Show\Field|Collection realname(string $label = null)
     * @method Show\Field|Collection review_result(string $label = null)
     * @method Show\Field|Collection review_status(string $label = null)
     * @method Show\Field|Collection review_time(string $label = null)
     * @method Show\Field|Collection service_tel(string $label = null)
     * @method Show\Field|Collection summary(string $label = null)
     * @method Show\Field|Collection tel(string $label = null)
     * @method Show\Field|Collection transfer_rate(string $label = null)
     * @method Show\Field|Collection wechat_name(string $label = null)
     * @method Show\Field|Collection wx_account_name(string $label = null)
     * @method Show\Field|Collection rate_data(string $label = null)
     * @method Show\Field|Collection type_data(string $label = null)
     * @method Show\Field|Collection virtual_type(string $label = null)
     * @method Show\Field|Collection ctr_type(string $label = null)
     * @method Show\Field|Collection edittime(string $label = null)
     * @method Show\Field|Collection audit_notes(string $label = null)
     * @method Show\Field|Collection audit_time(string $label = null)
     * @method Show\Field|Collection ctr_id(string $label = null)
     * @method Show\Field|Collection is_agree(string $label = null)
     * @method Show\Field|Collection ms_id(string $label = null)
     * @method Show\Field|Collection top_time(string $label = null)
     * @method Show\Field|Collection group(string $label = null)
     * @method Show\Field|Collection is_read(string $label = null)
     * @method Show\Field|Collection is_sound(string $label = null)
     * @method Show\Field|Collection is_enable(string $label = null)
     * @method Show\Field|Collection visit_date(string $label = null)
     * @method Show\Field|Collection open_time(string $label = null)
     * @method Show\Field|Collection buy_limit(string $label = null)
     * @method Show\Field|Collection buy_max(string $label = null)
     * @method Show\Field|Collection open_date(string $label = null)
     * @method Show\Field|Collection coupon(string $label = null)
     * @method Show\Field|Collection is_discount(string $label = null)
     * @method Show\Field|Collection sales(string $label = null)
     * @method Show\Field|Collection before_update_express(string $label = null)
     * @method Show\Field|Collection before_update_price(string $label = null)
     * @method Show\Field|Collection coupon_sub_price(string $label = null)
     * @method Show\Field|Collection express_price_1(string $label = null)
     * @method Show\Field|Collection first_price(string $label = null)
     * @method Show\Field|Collection give_integral(string $label = null)
     * @method Show\Field|Collection integral_amount(string $label = null)
     * @method Show\Field|Collection is_partner(string $label = null)
     * @method Show\Field|Collection is_price(string $label = null)
     * @method Show\Field|Collection is_revoke(string $label = null)
     * @method Show\Field|Collection is_sum(string $label = null)
     * @method Show\Field|Collection is_transfer(string $label = null)
     * @method Show\Field|Collection limit_time(string $label = null)
     * @method Show\Field|Collection order_source(string $label = null)
     * @method Show\Field|Collection parent_id_1(string $label = null)
     * @method Show\Field|Collection parent_id_2(string $label = null)
     * @method Show\Field|Collection second_price(string $label = null)
     * @method Show\Field|Collection seller_comments(string $label = null)
     * @method Show\Field|Collection share_price(string $label = null)
     * @method Show\Field|Collection third_price(string $label = null)
     * @method Show\Field|Collection user_coupon_id(string $label = null)
     * @method Show\Field|Collection mch_describe(string $label = null)
     * @method Show\Field|Collection mch_logistics(string $label = null)
     * @method Show\Field|Collection mch_service(string $label = null)
     * @method Show\Field|Collection address_id(string $label = null)
     * @method Show\Field|Collection is_return(string $label = null)
     * @method Show\Field|Collection is_user_send(string $label = null)
     * @method Show\Field|Collection order_refund_no(string $label = null)
     * @method Show\Field|Collection refund_price(string $label = null)
     * @method Show\Field|Collection response_time(string $label = null)
     * @method Show\Field|Collection return_express(string $label = null)
     * @method Show\Field|Collection return_express_no(string $label = null)
     * @method Show\Field|Collection user_send_express(string $label = null)
     * @method Show\Field|Collection user_send_express_no(string $label = null)
     * @method Show\Field|Collection is_area(string $label = null)
     * @method Show\Field|Collection unpaid(string $label = null)
     * @method Show\Field|Collection appeal_img(string $label = null)
     * @method Show\Field|Collection appeal_status(string $label = null)
     * @method Show\Field|Collection appeal_text(string $label = null)
     * @method Show\Field|Collection appeal_type(string $label = null)
     * @method Show\Field|Collection comment_id(string $label = null)
     * @method Show\Field|Collection is_appeal(string $label = null)
     * @method Show\Field|Collection coupon_amount(string $label = null)
     * @method Show\Field|Collection coupon_name(string $label = null)
     * @method Show\Field|Collection coupon_stock(string $label = null)
     * @method Show\Field|Collection coupon_type(string $label = null)
     * @method Show\Field|Collection period_validity(string $label = null)
     * @method Show\Field|Collection restriction_type(string $label = null)
     * @method Show\Field|Collection times_collection(string $label = null)
     * @method Show\Field|Collection use_threshold(string $label = null)
     * @method Show\Field|Collection full_reduction(string $label = null)
     * @method Show\Field|Collection cancel_type(string $label = null)
     * @method Show\Field|Collection express_rider(string $label = null)
     * @method Show\Field|Collection express_tel(string $label = null)
     * @method Show\Field|Collection full_price(string $label = null)
     * @method Show\Field|Collection invoice_id(string $label = null)
     * @method Show\Field|Collection invoice_type(string $label = null)
     * @method Show\Field|Collection is_full(string $label = null)
     * @method Show\Field|Collection is_overtime(string $label = null)
     * @method Show\Field|Collection is_reply(string $label = null)
     * @method Show\Field|Collection is_reservation(string $label = null)
     * @method Show\Field|Collection order_status(string $label = null)
     * @method Show\Field|Collection reply_time(string $label = null)
     * @method Show\Field|Collection reservation_time(string $label = null)
     * @method Show\Field|Collection packing_fee(string $label = null)
     * @method Show\Field|Collection reality_price(string $label = null)
     * @method Show\Field|Collection dada_api_url(string $label = null)
     * @method Show\Field|Collection dada_id(string $label = null)
     * @method Show\Field|Collection dada_key(string $label = null)
     * @method Show\Field|Collection dada_secret(string $label = null)
     * @method Show\Field|Collection dada_shop_id(string $label = null)
     * @method Show\Field|Collection delivery_method(string $label = null)
     * @method Show\Field|Collection end_hours(string $label = null)
     * @method Show\Field|Collection fengniao_api_url(string $label = null)
     * @method Show\Field|Collection fengniao_id(string $label = null)
     * @method Show\Field|Collection fengniao_key(string $label = null)
     * @method Show\Field|Collection is_bad_weather(string $label = null)
     * @method Show\Field|Collection is_dial(string $label = null)
     * @method Show\Field|Collection is_evaluate(string $label = null)
     * @method Show\Field|Collection is_self_mention(string $label = null)
     * @method Show\Field|Collection meituan_api_url(string $label = null)
     * @method Show\Field|Collection meituan_id(string $label = null)
     * @method Show\Field|Collection meituan_key(string $label = null)
     * @method Show\Field|Collection shansong_api_url(string $label = null)
     * @method Show\Field|Collection shansong_id(string $label = null)
     * @method Show\Field|Collection shansong_key(string $label = null)
     * @method Show\Field|Collection shop_notices(string $label = null)
     * @method Show\Field|Collection start_hours(string $label = null)
     * @method Show\Field|Collection virtual_delivery_time(string $label = null)
     * @method Show\Field|Collection ali_is_pay(string $label = null)
     * @method Show\Field|Collection ali_order_no(string $label = null)
     * @method Show\Field|Collection ali_refund(string $label = null)
     * @method Show\Field|Collection ali_sum_price(string $label = null)
     * @method Show\Field|Collection consumer_id(string $label = null)
     * @method Show\Field|Collection consumer_price(string $label = null)
     * @method Show\Field|Collection currency(string $label = null)
     * @method Show\Field|Collection is_balance(string $label = null)
     * @method Show\Field|Collection is_live(string $label = null)
     * @method Show\Field|Collection is_live_price(string $label = null)
     * @method Show\Field|Collection is_quick(string $label = null)
     * @method Show\Field|Collection jdvop_is_invoice(string $label = null)
     * @method Show\Field|Collection jdvop_is_pay(string $label = null)
     * @method Show\Field|Collection jdvop_order_no(string $label = null)
     * @method Show\Field|Collection jdvop_refund(string $label = null)
     * @method Show\Field|Collection jdvop_sum_price(string $label = null)
     * @method Show\Field|Collection live_id(string $label = null)
     * @method Show\Field|Collection order_union_id(string $label = null)
     * @method Show\Field|Collection send_email(string $label = null)
     * @method Show\Field|Collection user_dedu_balance(string $label = null)
     * @method Show\Field|Collection consumer_card_id(string $label = null)
     * @method Show\Field|Collection is_exchange(string $label = null)
     * @method Show\Field|Collection ordedr_sn(string $label = null)
     * @method Show\Field|Collection ali_unit_price(string $label = null)
     * @method Show\Field|Collection parts_price(string $label = null)
     * @method Show\Field|Collection vr_data_id(string $label = null)
     * @method Show\Field|Collection vr_list_id(string $label = null)
     * @method Show\Field|Collection EBusinessID(string $label = null)
     * @method Show\Field|Collection express_code(string $label = null)
     * @method Show\Field|Collection printTeplate(string $label = null)
     * @method Show\Field|Collection ali_json(string $label = null)
     * @method Show\Field|Collection ali_refund_Id(string $label = null)
     * @method Show\Field|Collection parent_id_3(string $label = null)
     * @method Show\Field|Collection order_id_list(string $label = null)
     * @method Show\Field|Collection diff_money(string $label = null)
     * @method Show\Field|Collection finish(string $label = null)
     * @method Show\Field|Collection info(string $label = null)
     * @method Show\Field|Collection out_order_no(string $label = null)
     * @method Show\Field|Collection sub_mchid(string $label = null)
     * @method Show\Field|Collection bank_memo(string $label = null)
     * @method Show\Field|Collection out_request_no(string $label = null)
     * @method Show\Field|Collection withdraw_id(string $label = null)
     * @method Show\Field|Collection gift_id(string $label = null)
     * @method Show\Field|Collection image_url(string $label = null)
     * @method Show\Field|Collection orderby(string $label = null)
     * @method Show\Field|Collection pond_id(string $label = null)
     * @method Show\Field|Collection deplete_register(string $label = null)
     * @method Show\Field|Collection oppty(string $label = null)
     * @method Show\Field|Collection probability(string $label = null)
     * @method Show\Field|Collection printer_setting(string $label = null)
     * @method Show\Field|Collection printer_type(string $label = null)
     * @method Show\Field|Collection big(string $label = null)
     * @method Show\Field|Collection block_id(string $label = null)
     * @method Show\Field|Collection is_attr(string $label = null)
     * @method Show\Field|Collection printer_id(string $label = null)
     * @method Show\Field|Collection colonel(string $label = null)
     * @method Show\Field|Collection group_num(string $label = null)
     * @method Show\Field|Collection grouptime(string $label = null)
     * @method Show\Field|Collection is_more(string $label = null)
     * @method Show\Field|Collection is_only(string $label = null)
     * @method Show\Field|Collection one_buy_limit(string $label = null)
     * @method Show\Field|Collection group_time(string $label = null)
     * @method Show\Field|Collection class_group(string $label = null)
     * @method Show\Field|Collection is_group(string $label = null)
     * @method Show\Field|Collection is_returnd(string $label = null)
     * @method Show\Field|Collection is_success(string $label = null)
     * @method Show\Field|Collection offline(string $label = null)
     * @method Show\Field|Collection success_time(string $label = null)
     * @method Show\Field|Collection avatar_position(string $label = null)
     * @method Show\Field|Collection avatar_size(string $label = null)
     * @method Show\Field|Collection font(string $label = null)
     * @method Show\Field|Collection font_position(string $label = null)
     * @method Show\Field|Collection preview(string $label = null)
     * @method Show\Field|Collection qrcode_bg(string $label = null)
     * @method Show\Field|Collection qrcode_position(string $label = null)
     * @method Show\Field|Collection qrcode_size(string $label = null)
     * @method Show\Field|Collection send_price(string $label = null)
     * @method Show\Field|Collection continuation(string $label = null)
     * @method Show\Field|Collection register_time(string $label = null)
     * @method Show\Field|Collection account_info(string $label = null)
     * @method Show\Field|Collection applyment_id(string $label = null)
     * @method Show\Field|Collection business_addition_desc(string $label = null)
     * @method Show\Field|Collection business_addition_pics(string $label = null)
     * @method Show\Field|Collection business_license_info(string $label = null)
     * @method Show\Field|Collection contact_info(string $label = null)
     * @method Show\Field|Collection id_card_info(string $label = null)
     * @method Show\Field|Collection id_doc_info(string $label = null)
     * @method Show\Field|Collection id_doc_type(string $label = null)
     * @method Show\Field|Collection merchant_shortname(string $label = null)
     * @method Show\Field|Collection need_account_info(string $label = null)
     * @method Show\Field|Collection organization_cert_info(string $label = null)
     * @method Show\Field|Collection organization_type(string $label = null)
     * @method Show\Field|Collection sales_scene_info(string $label = null)
     * @method Show\Field|Collection company(string $label = null)
     * @method Show\Field|Collection delivery_id(string $label = null)
     * @method Show\Field|Collection exp_area(string $label = null)
     * @method Show\Field|Collection post_code(string $label = null)
     * @method Show\Field|Collection expire(string $label = null)
     * @method Show\Field|Collection agree(string $label = null)
     * @method Show\Field|Collection auto_share_val(string $label = null)
     * @method Show\Field|Collection bank(string $label = null)
     * @method Show\Field|Collection condition(string $label = null)
     * @method Show\Field|Collection first(string $label = null)
     * @method Show\Field|Collection first_name(string $label = null)
     * @method Show\Field|Collection is_rebate(string $label = null)
     * @method Show\Field|Collection min_money(string $label = null)
     * @method Show\Field|Collection pic_url_1(string $label = null)
     * @method Show\Field|Collection pic_url_2(string $label = null)
     * @method Show\Field|Collection price_type(string $label = null)
     * @method Show\Field|Collection remaining_sum(string $label = null)
     * @method Show\Field|Collection second_name(string $label = null)
     * @method Show\Field|Collection share_condition(string $label = null)
     * @method Show\Field|Collection share_good_id(string $label = null)
     * @method Show\Field|Collection share_good_status(string $label = null)
     * @method Show\Field|Collection third(string $label = null)
     * @method Show\Field|Collection third_name(string $label = null)
     * @method Show\Field|Collection cover_url(string $label = null)
     * @method Show\Field|Collection shop_time(string $label = null)
     * @method Show\Field|Collection fictitious_collection(string $label = null)
     * @method Show\Field|Collection fictitious_forward(string $label = null)
     * @method Show\Field|Collection fictitious_give(string $label = null)
     * @method Show\Field|Collection fictitious_play(string $label = null)
     * @method Show\Field|Collection short_video_id(string $label = null)
     * @method Show\Field|Collection tpl(string $label = null)
     * @method Show\Field|Collection AccessKeyId(string $label = null)
     * @method Show\Field|Collection AccessKeySecret(string $label = null)
     * @method Show\Field|Collection tpl_code(string $label = null)
     * @method Show\Field|Collection tpl_refund(string $label = null)
     * @method Show\Field|Collection next_full(string $label = null)
     * @method Show\Field|Collection next_reduce(string $label = null)
     * @method Show\Field|Collection reduce(string $label = null)
     * @method Show\Field|Collection spell_id(string $label = null)
     * @method Show\Field|Collection full(string $label = null)
     * @method Show\Field|Collection effective_time(string $label = null)
     * @method Show\Field|Collection bail_currency(string $label = null)
     * @method Show\Field|Collection step_num(string $label = null)
     * @method Show\Field|Collection step_currency(string $label = null)
     * @method Show\Field|Collection step_id(string $label = null)
     * @method Show\Field|Collection type_id(string $label = null)
     * @method Show\Field|Collection activity_rule(string $label = null)
     * @method Show\Field|Collection convert_max(string $label = null)
     * @method Show\Field|Collection convert_ratio(string $label = null)
     * @method Show\Field|Collection invite_ratio(string $label = null)
     * @method Show\Field|Collection qrcode_title(string $label = null)
     * @method Show\Field|Collection ranking_num(string $label = null)
     * @method Show\Field|Collection remind_time(string $label = null)
     * @method Show\Field|Collection ratio(string $label = null)
     * @method Show\Field|Collection remind(string $label = null)
     * @method Show\Field|Collection acid(string $label = null)
     * @method Show\Field|Collection after_sale_time(string $label = null)
     * @method Show\Field|Collection buy_member(string $label = null)
     * @method Show\Field|Collection cat_goods_cols(string $label = null)
     * @method Show\Field|Collection cat_goods_count(string $label = null)
     * @method Show\Field|Collection cat_style(string $label = null)
     * @method Show\Field|Collection copyright(string $label = null)
     * @method Show\Field|Collection copyright_pic_url(string $label = null)
     * @method Show\Field|Collection copyright_url(string $label = null)
     * @method Show\Field|Collection cut_thread(string $label = null)
     * @method Show\Field|Collection delivery_time(string $label = null)
     * @method Show\Field|Collection dial(string $label = null)
     * @method Show\Field|Collection dial_pic(string $label = null)
     * @method Show\Field|Collection good_negotiable(string $label = null)
     * @method Show\Field|Collection home_page_module(string $label = null)
     * @method Show\Field|Collection integration(string $label = null)
     * @method Show\Field|Collection is_coupon(string $label = null)
     * @method Show\Field|Collection is_member(string $label = null)
     * @method Show\Field|Collection is_member_price(string $label = null)
     * @method Show\Field|Collection is_official_account(string $label = null)
     * @method Show\Field|Collection is_outh_open(string $label = null)
     * @method Show\Field|Collection is_quick_order(string $label = null)
     * @method Show\Field|Collection is_sales(string $label = null)
     * @method Show\Field|Collection is_share_price(string $label = null)
     * @method Show\Field|Collection kdniao_api_key(string $label = null)
     * @method Show\Field|Collection kdniao_mch_id(string $label = null)
     * @method Show\Field|Collection member_content(string $label = null)
     * @method Show\Field|Collection nav_count(string $label = null)
     * @method Show\Field|Collection o2o_max_distance(string $label = null)
     * @method Show\Field|Collection order_send_tpl(string $label = null)
     * @method Show\Field|Collection over_day(string $label = null)
     * @method Show\Field|Collection purchase_frame(string $label = null)
     * @method Show\Field|Collection quick_order_type(string $label = null)
     * @method Show\Field|Collection quick_user_type(string $label = null)
     * @method Show\Field|Collection recommend_count(string $label = null)
     * @method Show\Field|Collection search_hot_content(string $label = null)
     * @method Show\Field|Collection search_hot_open(string $label = null)
     * @method Show\Field|Collection send_type(string $label = null)
     * @method Show\Field|Collection show_customer_service(string $label = null)
     * @method Show\Field|Collection use_wechat_platform_pay(string $label = null)
     * @method Show\Field|Collection wechat_app_id(string $label = null)
     * @method Show\Field|Collection wechat_platform_id(string $label = null)
     * @method Show\Field|Collection class(string $label = null)
     * @method Show\Field|Collection delay_seconds(string $label = null)
     * @method Show\Field|Collection is_executed(string $label = null)
     * @method Show\Field|Collection params(string $label = null)
     * @method Show\Field|Collection tpl_id(string $label = null)
     * @method Show\Field|Collection tpl_name(string $label = null)
     * @method Show\Field|Collection cat_template(string $label = null)
     * @method Show\Field|Collection deliveryDay(string $label = null)
     * @method Show\Field|Collection EfficientGoodsCardNum(string $label = null)
     * @method Show\Field|Collection EfficientGoodsCardOrgan(string $label = null)
     * @method Show\Field|Collection EfficientGoodsImagePath(string $label = null)
     * @method Show\Field|Collection energy_type(string $label = null)
     * @method Show\Field|Collection import_type(string $label = null)
     * @method Show\Field|Collection model_number(string $label = null)
     * @method Show\Field|Collection protection_type(string $label = null)
     * @method Show\Field|Collection sku(string $label = null)
     * @method Show\Field|Collection dep_name(string $label = null)
     * @method Show\Field|Collection drawer_name(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection invoice(string $label = null)
     * @method Show\Field|Collection invoice_title(string $label = null)
     * @method Show\Field|Collection mode(string $label = null)
     * @method Show\Field|Collection order_price(string $label = null)
     * @method Show\Field|Collection total(string $label = null)
     * @method Show\Field|Collection yggc_order(string $label = null)
     * @method Show\Field|Collection unitPrice(string $label = null)
     * @method Show\Field|Collection agree_count(string $label = null)
     * @method Show\Field|Collection is_chosen(string $label = null)
     * @method Show\Field|Collection layout(string $label = null)
     * @method Show\Field|Collection qrcode_pic(string $label = null)
     * @method Show\Field|Collection read_count(string $label = null)
     * @method Show\Field|Collection sub_title(string $label = null)
     * @method Show\Field|Collection virtual_agree_count(string $label = null)
     * @method Show\Field|Collection virtual_favorite_count(string $label = null)
     * @method Show\Field|Collection virtual_read_count(string $label = null)
     * @method Show\Field|Collection topic_id(string $label = null)
     * @method Show\Field|Collection aliyun(string $label = null)
     * @method Show\Field|Collection qcloud(string $label = null)
     * @method Show\Field|Collection qiniu(string $label = null)
     * @method Show\Field|Collection storage_type(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection file_name(string $label = null)
     * @method Show\Field|Collection file_url(string $label = null)
     * @method Show\Field|Collection group_id(string $label = null)
     * @method Show\Field|Collection img_height(string $label = null)
     * @method Show\Field|Collection img_width(string $label = null)
     * @method Show\Field|Collection size(string $label = null)
     * @method Show\Field|Collection app_source(string $label = null)
     * @method Show\Field|Collection apple_openid(string $label = null)
     * @method Show\Field|Collection avatar_url(string $label = null)
     * @method Show\Field|Collection binding(string $label = null)
     * @method Show\Field|Collection blacklist(string $label = null)
     * @method Show\Field|Collection clientid(string $label = null)
     * @method Show\Field|Collection comments(string $label = null)
     * @method Show\Field|Collection contact_way(string $label = null)
     * @method Show\Field|Collection is_app(string $label = null)
     * @method Show\Field|Collection is_clerk(string $label = null)
     * @method Show\Field|Collection is_distributor(string $label = null)
     * @method Show\Field|Collection is_web(string $label = null)
     * @method Show\Field|Collection parent_user_id(string $label = null)
     * @method Show\Field|Collection saas_id(string $label = null)
     * @method Show\Field|Collection total_integral(string $label = null)
     * @method Show\Field|Collection wechat_platform_open_id(string $label = null)
     * @method Show\Field|Collection wechat_union_id(string $label = null)
     * @method Show\Field|Collection is_pass(string $label = null)
     * @method Show\Field|Collection card_content(string $label = null)
     * @method Show\Field|Collection card_name(string $label = null)
     * @method Show\Field|Collection card_pic_url(string $label = null)
     * @method Show\Field|Collection clerk_time(string $label = null)
     * @method Show\Field|Collection is_use(string $label = null)
     * @method Show\Field|Collection surplus(string $label = null)
     * @method Show\Field|Collection coupon_auto_send_id(string $label = null)
     * @method Show\Field|Collection mode_value(string $label = null)
     * @method Show\Field|Collection times(string $label = null)
     * @method Show\Field|Collection after_change(string $label = null)
     * @method Show\Field|Collection before_change(string $label = null)
     * @method Show\Field|Collection is_consumer_card(string $label = null)
     * @method Show\Field|Collection key_name(string $label = null)
     * @method Show\Field|Collection pasttime(string $label = null)
     * @method Show\Field|Collection role_tab(string $label = null)
     * @method Show\Field|Collection use_dis(string $label = null)
     * @method Show\Field|Collection usetime(string $label = null)
     * @method Show\Field|Collection vcd_sort(string $label = null)
     * @method Show\Field|Collection vr_cat(string $label = null)
     * @method Show\Field|Collection key_salt(string $label = null)
     * @method Show\Field|Collection role_cont(string $label = null)
     * @method Show\Field|Collection use_order(string $label = null)
     * @method Show\Field|Collection use_uid(string $label = null)
     * @method Show\Field|Collection vcd_id(string $label = null)
     * @method Show\Field|Collection vcl_sort(string $label = null)
     * @method Show\Field|Collection examine_msg(string $label = null)
     * @method Show\Field|Collection app_secret(string $label = null)
     * @method Show\Field|Collection cert_pem(string $label = null)
     * @method Show\Field|Collection key_pem(string $label = null)
     * @method Show\Field|Collection original_id(string $label = null)
     * @method Show\Field|Collection uni_app_id(string $label = null)
     * @method Show\Field|Collection web_app_id(string $label = null)
     * @method Show\Field|Collection web_app_secret(string $label = null)
     * @method Show\Field|Collection api_key(string $label = null)
     * @method Show\Field|Collection apiv3_key(string $label = null)
     * @method Show\Field|Collection platform_cert_date(string $label = null)
     * @method Show\Field|Collection platform_cert_pem(string $label = null)
     * @method Show\Field|Collection platform_serial_no(string $label = null)
     * @method Show\Field|Collection serial_no(string $label = null)
     * @method Show\Field|Collection not_pay_tpl(string $label = null)
     * @method Show\Field|Collection pay_tpl(string $label = null)
     * @method Show\Field|Collection refund_tpl(string $label = null)
     * @method Show\Field|Collection revoke_tpl(string $label = null)
     * @method Show\Field|Collection send_tpl(string $label = null)
     * @method Show\Field|Collection create_comment_tab(string $label = null)
     * @method Show\Field|Collection create_goods_tab(string $label = null)
     * @method Show\Field|Collection create_like_tab(string $label = null)
     * @method Show\Field|Collection feeds_img(string $label = null)
     * @method Show\Field|Collection feeds_img_link(string $label = null)
     * @method Show\Field|Collection goods_list(string $label = null)
     * @method Show\Field|Collection live_backimg(string $label = null)
     * @method Show\Field|Collection live_backimg_link(string $label = null)
     * @method Show\Field|Collection live_nickname(string $label = null)
     * @method Show\Field|Collection live_size(string $label = null)
     * @method Show\Field|Collection live_title(string $label = null)
     * @method Show\Field|Collection live_type(string $label = null)
     * @method Show\Field|Collection notice_url(string $label = null)
     * @method Show\Field|Collection push_url(string $label = null)
     * @method Show\Field|Collection res_desc(string $label = null)
     * @method Show\Field|Collection room_id(string $label = null)
     * @method Show\Field|Collection share_img(string $label = null)
     * @method Show\Field|Collection share_img_link(string $label = null)
     * @method Show\Field|Collection wx_account(string $label = null)
     * @method Show\Field|Collection wxll_desc(string $label = null)
     * @method Show\Field|Collection audit_id(string $label = null)
     * @method Show\Field|Collection cover_img_url(string $label = null)
     * @method Show\Field|Collection end_price(string $label = null)
     * @method Show\Field|Collection jump_url(string $label = null)
     * @method Show\Field|Collection start_price(string $label = null)
     * @method Show\Field|Collection third_party_tag(string $label = null)
     * @method Show\Field|Collection wx_goods_id(string $label = null)
     * @method Show\Field|Collection anchor_name(string $label = null)
     * @method Show\Field|Collection goods(string $label = null)
     * @method Show\Field|Collection goods_shelves(string $label = null)
     * @method Show\Field|Collection is_pull_replay(string $label = null)
     * @method Show\Field|Collection live_status(string $label = null)
     * @method Show\Field|Collection roomid(string $label = null)
     * @method Show\Field|Collection wx_goods_ids(string $label = null)
     * @method Show\Field|Collection media_url(string $label = null)
     * @method Show\Field|Collection is_refund(string $label = null)
     * @method Show\Field|Collection refund_time(string $label = null)
     * @method Show\Field|Collection use_time(string $label = null)
     * @method Show\Field|Collection cat(string $label = null)
     * @method Show\Field|Collection refund_notice(string $label = null)
     * @method Show\Field|Collection success_notice(string $label = null)
     * @method Show\Field|Collection consigneeAddress(string $label = null)
     * @method Show\Field|Collection consigneeMobile(string $label = null)
     * @method Show\Field|Collection consigneeName(string $label = null)
     * @method Show\Field|Collection creatorMobile(string $label = null)
     * @method Show\Field|Collection creatorName(string $label = null)
     * @method Show\Field|Collection creatorOrgName(string $label = null)
     * @method Show\Field|Collection invoiceAddress(string $label = null)
     * @method Show\Field|Collection invoiceTitle(string $label = null)
     * @method Show\Field|Collection invoiceType(string $label = null)
     * @method Show\Field|Collection itins(string $label = null)
     * @method Show\Field|Collection payOrgName(string $label = null)
     * @method Show\Field|Collection telephone(string $label = null)
     * @method Show\Field|Collection yc_order_no(string $label = null)
     * @method Show\Field|Collection zycg_url(string $label = null)
     * @method Show\Field|Collection discountRate(string $label = null)
     * @method Show\Field|Collection colour(string $label = null)
     * @method Show\Field|Collection rate(string $label = null)
     * @method Show\Field|Collection companyCustNo(string $label = null)
     * @method Show\Field|Collection invoiceAccount(string $label = null)
     * @method Show\Field|Collection invoiceAddr(string $label = null)
     * @method Show\Field|Collection invoiceBank(string $label = null)
     * @method Show\Field|Collection invoiceContent(string $label = null)
     * @method Show\Field|Collection orderId(string $label = null)
     * @method Show\Field|Collection orderType(string $label = null)
     * @method Show\Field|Collection receiverName(string $label = null)
     * @method Show\Field|Collection servFee(string $label = null)
     * @method Show\Field|Collection taxno(string $label = null)
     * @method Show\Field|Collection tradeNo(string $label = null)
     * @method Show\Field|Collection region_id(string $label = null)
     * @method Show\Field|Collection region_name(string $label = null)
     * @method Show\Field|Collection region_type(string $label = null)
     * @method Show\Field|Collection zzds_url(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
