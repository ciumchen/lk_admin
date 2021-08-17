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
     * @property Grid\Column|Collection billId
     * @property Grid\Column|Collection classType
     * @property Grid\Column|Collection facePrice
     * @property Grid\Column|Collection itemCost
     * @property Grid\Column|Collection itemName
     * @property Grid\Column|Collection itemNum
     * @property Grid\Column|Collection operateTime
     * @property Grid\Column|Collection orderCost
     * @property Grid\Column|Collection orderProfit
     * @property Grid\Column|Collection orderTime
     * @property Grid\Column|Collection orderTimeFull
     * @property Grid\Column|Collection payState
     * @property Grid\Column|Collection rechargeAccount
     * @property Grid\Column|Collection rechargeState
     * @property Grid\Column|Collection revokeMessage
     * @property Grid\Column|Collection saleAmount
     * @property Grid\Column|Collection supUserId
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
     * @property Grid\Column|Collection alipay_alipay_user_id
     * @property Grid\Column|Collection alipay_avatar
     * @property Grid\Column|Collection alipay_nickname
     * @property Grid\Column|Collection alipay_user_id
     * @property Grid\Column|Collection access_token
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
     * @property Grid\Column|Collection sys_mid
     * @property Grid\Column|Collection edit_to_phone
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection alipay_account
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
     * @method Grid\Column|Collection billId(string $label = null)
     * @method Grid\Column|Collection classType(string $label = null)
     * @method Grid\Column|Collection facePrice(string $label = null)
     * @method Grid\Column|Collection itemCost(string $label = null)
     * @method Grid\Column|Collection itemName(string $label = null)
     * @method Grid\Column|Collection itemNum(string $label = null)
     * @method Grid\Column|Collection operateTime(string $label = null)
     * @method Grid\Column|Collection orderCost(string $label = null)
     * @method Grid\Column|Collection orderProfit(string $label = null)
     * @method Grid\Column|Collection orderTime(string $label = null)
     * @method Grid\Column|Collection orderTimeFull(string $label = null)
     * @method Grid\Column|Collection payState(string $label = null)
     * @method Grid\Column|Collection rechargeAccount(string $label = null)
     * @method Grid\Column|Collection rechargeState(string $label = null)
     * @method Grid\Column|Collection revokeMessage(string $label = null)
     * @method Grid\Column|Collection saleAmount(string $label = null)
     * @method Grid\Column|Collection supUserId(string $label = null)
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
     * @method Grid\Column|Collection alipay_alipay_user_id(string $label = null)
     * @method Grid\Column|Collection alipay_avatar(string $label = null)
     * @method Grid\Column|Collection alipay_nickname(string $label = null)
     * @method Grid\Column|Collection alipay_user_id(string $label = null)
     * @method Grid\Column|Collection access_token(string $label = null)
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
     * @method Grid\Column|Collection sys_mid(string $label = null)
     * @method Grid\Column|Collection edit_to_phone(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection alipay_account(string $label = null)
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
     * @property Show\Field|Collection billId
     * @property Show\Field|Collection classType
     * @property Show\Field|Collection facePrice
     * @property Show\Field|Collection itemCost
     * @property Show\Field|Collection itemName
     * @property Show\Field|Collection itemNum
     * @property Show\Field|Collection operateTime
     * @property Show\Field|Collection orderCost
     * @property Show\Field|Collection orderProfit
     * @property Show\Field|Collection orderTime
     * @property Show\Field|Collection orderTimeFull
     * @property Show\Field|Collection payState
     * @property Show\Field|Collection rechargeAccount
     * @property Show\Field|Collection rechargeState
     * @property Show\Field|Collection revokeMessage
     * @property Show\Field|Collection saleAmount
     * @property Show\Field|Collection supUserId
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
     * @property Show\Field|Collection alipay_alipay_user_id
     * @property Show\Field|Collection alipay_avatar
     * @property Show\Field|Collection alipay_nickname
     * @property Show\Field|Collection alipay_user_id
     * @property Show\Field|Collection access_token
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
     * @property Show\Field|Collection sys_mid
     * @property Show\Field|Collection edit_to_phone
     * @property Show\Field|Collection time
     * @property Show\Field|Collection alipay_account
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
     * @method Show\Field|Collection billId(string $label = null)
     * @method Show\Field|Collection classType(string $label = null)
     * @method Show\Field|Collection facePrice(string $label = null)
     * @method Show\Field|Collection itemCost(string $label = null)
     * @method Show\Field|Collection itemName(string $label = null)
     * @method Show\Field|Collection itemNum(string $label = null)
     * @method Show\Field|Collection operateTime(string $label = null)
     * @method Show\Field|Collection orderCost(string $label = null)
     * @method Show\Field|Collection orderProfit(string $label = null)
     * @method Show\Field|Collection orderTime(string $label = null)
     * @method Show\Field|Collection orderTimeFull(string $label = null)
     * @method Show\Field|Collection payState(string $label = null)
     * @method Show\Field|Collection rechargeAccount(string $label = null)
     * @method Show\Field|Collection rechargeState(string $label = null)
     * @method Show\Field|Collection revokeMessage(string $label = null)
     * @method Show\Field|Collection saleAmount(string $label = null)
     * @method Show\Field|Collection supUserId(string $label = null)
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
     * @method Show\Field|Collection alipay_alipay_user_id(string $label = null)
     * @method Show\Field|Collection alipay_avatar(string $label = null)
     * @method Show\Field|Collection alipay_nickname(string $label = null)
     * @method Show\Field|Collection alipay_user_id(string $label = null)
     * @method Show\Field|Collection access_token(string $label = null)
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
     * @method Show\Field|Collection sys_mid(string $label = null)
     * @method Show\Field|Collection edit_to_phone(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection alipay_account(string $label = null)
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
