<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_endpoints', function (Blueprint $table) {
            $table->string('id', 40)->index('ps_endpoints_id');
            $table->string('transport', 40)->nullable();
            $table->string('aors', 200)->nullable();
            $table->string('auth', 40)->nullable();
            $table->string('context', 40)->nullable();
            $table->string('disallow', 200)->nullable();
            $table->string('allow', 200)->nullable();
            $table->enum('direct_media', ['yes', 'no'])->nullable();
            $table->enum('connected_line_method', ['invite', 'reinvite', 'update'])->nullable();
            $table->enum('direct_media_method', ['invite', 'reinvite', 'update'])->nullable();
            $table->enum('direct_media_glare_mitigation', ['none', 'outgoing', 'incoming'])->nullable();
            $table->enum('disable_direct_media_on_nat', ['yes', 'no'])->nullable();
            $table->enum('dtmf_mode', ['rfc4733', 'inband', 'info', 'auto', 'auto_info'])->nullable();
            $table->string('external_media_address', 40)->nullable();
            $table->enum('force_rport', ['yes', 'no'])->nullable();
            $table->enum('ice_support', ['yes', 'no'])->nullable();
            $table->string('identify_by', 80)->nullable();
            $table->string('mailboxes', 40)->nullable();
            $table->string('moh_suggest', 40)->nullable();
            $table->string('outbound_auth', 40)->nullable();
            $table->string('outbound_proxy', 40)->nullable();
            $table->enum('rewrite_contact', ['yes', 'no'])->nullable();
            $table->enum('rtp_ipv6', ['yes', 'no'])->nullable();
            $table->enum('rtp_symmetric', ['yes', 'no'])->nullable();
            $table->enum('send_diversion', ['yes', 'no'])->nullable();
            $table->enum('send_pai', ['yes', 'no'])->nullable();
            $table->enum('send_rpid', ['yes', 'no'])->nullable();
            $table->integer('timers_min_se')->nullable();
            $table->enum('timers', ['forced', 'no', 'required', 'yes'])->nullable();
            $table->integer('timers_sess_expires')->nullable();
            $table->string('callerid', 40)->nullable();
            $table->enum('callerid_privacy', ['allowed_not_screened', 'allowed_passed_screened', 'allowed_failed_screened', 'allowed', 'prohib_not_screened', 'prohib_passed_screened', 'prohib_failed_screened', 'prohib', 'unavailable'])->nullable();
            $table->string('callerid_tag', 40)->nullable();
            $table->enum('100rel', ['no', 'required', 'yes'])->nullable();
            $table->enum('aggregate_mwi', ['yes', 'no'])->nullable();
            $table->enum('trust_id_inbound', ['yes', 'no'])->nullable();
            $table->enum('trust_id_outbound', ['yes', 'no'])->nullable();
            $table->enum('use_ptime', ['yes', 'no'])->nullable();
            $table->enum('use_avpf', ['yes', 'no'])->nullable();
            $table->enum('media_encryption', ['no', 'sdes', 'dtls'])->nullable();
            $table->enum('inband_progress', ['yes', 'no'])->nullable();
            $table->string('call_group', 40)->nullable();
            $table->string('pickup_group', 40)->nullable();
            $table->string('named_call_group', 40)->nullable();
            $table->string('named_pickup_group', 40)->nullable();
            $table->integer('device_state_busy_at')->nullable();
            $table->enum('fax_detect', ['yes', 'no'])->nullable();
            $table->enum('t38_udptl', ['yes', 'no'])->nullable();
            $table->enum('t38_udptl_ec', ['none', 'fec', 'redundancy'])->nullable();
            $table->integer('t38_udptl_maxdatagram')->nullable();
            $table->enum('t38_udptl_nat', ['yes', 'no'])->nullable();
            $table->enum('t38_udptl_ipv6', ['yes', 'no'])->nullable();
            $table->string('tone_zone', 40)->nullable();
            $table->string('language', 40)->nullable();
            $table->enum('one_touch_recording', ['yes', 'no'])->nullable();
            $table->string('record_on_feature', 40)->nullable();
            $table->string('record_off_feature', 40)->nullable();
            $table->string('rtp_engine', 40)->nullable();
            $table->enum('allow_transfer', ['yes', 'no'])->nullable();
            $table->enum('allow_subscribe', ['yes', 'no'])->nullable();
            $table->string('sdp_owner', 40)->nullable();
            $table->string('sdp_session', 40)->nullable();
            $table->string('tos_audio', 10)->nullable();
            $table->string('tos_video', 10)->nullable();
            $table->integer('sub_min_expiry')->nullable();
            $table->string('from_domain', 40)->nullable();
            $table->string('from_user', 40)->nullable();
            $table->string('mwi_from_user', 40)->nullable();
            $table->string('dtls_verify', 40)->nullable();
            $table->string('dtls_rekey', 40)->nullable();
            $table->string('dtls_cert_file', 200)->nullable();
            $table->string('dtls_private_key', 200)->nullable();
            $table->string('dtls_cipher', 200)->nullable();
            $table->string('dtls_ca_file', 200)->nullable();
            $table->string('dtls_ca_path', 200)->nullable();
            $table->enum('dtls_setup', ['active', 'passive', 'actpass'])->nullable();
            $table->enum('srtp_tag_32', ['yes', 'no'])->nullable();
            $table->string('media_address', 40)->nullable();
            $table->enum('redirect_method', ['user', 'uri_core', 'uri_pjsip'])->nullable();
            $table->text('set_var')->nullable();
            $table->integer('cos_audio')->nullable();
            $table->integer('cos_video')->nullable();
            $table->string('message_context', 40)->nullable();
            $table->enum('force_avp', ['yes', 'no'])->nullable();
            $table->enum('media_use_received_transport', ['yes', 'no'])->nullable();
            $table->string('accountcode', 80)->nullable();
            $table->enum('user_eq_phone', ['yes', 'no'])->nullable();
            $table->enum('moh_passthrough', ['yes', 'no'])->nullable();
            $table->enum('media_encryption_optimistic', ['yes', 'no'])->nullable();
            $table->enum('rpid_immediate', ['yes', 'no'])->nullable();
            $table->enum('g726_non_standard', ['yes', 'no'])->nullable();
            $table->integer('rtp_keepalive')->nullable();
            $table->integer('rtp_timeout')->nullable();
            $table->integer('rtp_timeout_hold')->nullable();
            $table->enum('bind_rtp_to_media_address', ['yes', 'no'])->nullable();
            $table->string('voicemail_extension', 40)->nullable();
            $table->enum('mwi_subscribe_replaces_unsolicited', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->string('deny', 95)->nullable();
            $table->string('permit', 95)->nullable();
            $table->string('acl', 40)->nullable();
            $table->string('contact_deny', 95)->nullable();
            $table->string('contact_permit', 95)->nullable();
            $table->string('contact_acl', 40)->nullable();
            $table->string('subscribe_context', 40)->nullable();
            $table->integer('fax_detect_timeout')->nullable();
            $table->string('contact_user', 80)->nullable();
            $table->enum('preferred_codec_only', ['yes', 'no'])->nullable();
            $table->enum('asymmetric_rtp_codec', ['yes', 'no'])->nullable();
            $table->enum('rtcp_mux', ['yes', 'no'])->nullable();
            $table->enum('allow_overlap', ['yes', 'no'])->nullable();
            $table->enum('refer_blind_progress', ['yes', 'no'])->nullable();
            $table->enum('notify_early_inuse_ringing', ['yes', 'no'])->nullable();
            $table->integer('max_audio_streams')->nullable();
            $table->integer('max_video_streams')->nullable();
            $table->enum('webrtc', ['yes', 'no'])->nullable();
            $table->enum('dtls_fingerprint', ['SHA-1', 'SHA-256'])->nullable();
            $table->string('incoming_mwi_mailbox', 40)->nullable();
            $table->enum('bundle', ['yes', 'no'])->nullable();
            $table->enum('dtls_auto_generate_cert', ['yes', 'no'])->nullable();
            $table->enum('follow_early_media_fork', ['yes', 'no'])->nullable();
            $table->enum('accept_multiple_sdp_answers', ['yes', 'no'])->nullable();
            $table->enum('suppress_q850_reason_headers', ['yes', 'no'])->nullable();
            $table->enum('trust_connected_line', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->enum('send_connected_line', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->enum('ignore_183_without_sdp', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->string('codec_prefs_incoming_offer', 128)->nullable();
            $table->string('codec_prefs_outgoing_offer', 128)->nullable();
            $table->string('codec_prefs_incoming_answer', 128)->nullable();
            $table->string('codec_prefs_outgoing_answer', 128)->nullable();
            $table->enum('stir_shaken', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->enum('send_history_info', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->enum('allow_unauthenticated_options', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
            $table->enum('t38_bind_udptl_to_media_address', ['0', '1', 'off', 'on', 'false', 'true', 'no', 'yes'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ps_endpoints');
    }
}
