<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'wp_visualizing_v2');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>#?pLPB8GfaHL{X*&4Vj.]=+NNx/-IfSIO*euC1?_Mt5|mRewU$0.>V+P+GRN5X/');
define('SECURE_AUTH_KEY',  'TslL *,vr4N~Zxl12U+?@jS) 2 =-+kZkVWqWG|2-eEhFH]tEOmNn52IPx[BD-X[');
define('LOGGED_IN_KEY',    '-,|5KTp[X[ `ND_e:haNJD---Rb6_l9<TwCr[t_bgwjd-srC.k+,Z*y`<-(~8[Yw');
define('NONCE_KEY',        'SmYuc/hxfM.-M/F&jIIx[/7E=u#C1X:kLkH$;_+cc7$:f$|wL|$(f}NNi2#g8kF?');
define('AUTH_SALT',        'V2<bx*aOR|E=}+])YyCr:YlH,|yZpz-SJUb.pY?(*|Zz[RHR|3xN4I+|`>[X +->');
define('SECURE_AUTH_SALT', 's:5Tvb_7$Uk[+dFi}]wZI!Yt=HROvH{+`t^:`0KkQmn#|p4+e?NnooL7jA-3K@55');
define('LOGGED_IN_SALT',   ']J7_dpErjQ`sL0:-!/R<tIje396gE63gohjFmR{LIE=6`j6xpQP3L-)y#2)IESom');
define('NONCE_SALT',       '<f,:D4E@ wOZCy1)):]<=9CBXAqML*^ou6lJ/Tz-:B{B-f@?,7h9QJ^^QGq-%)wq');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
