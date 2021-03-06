<?php
// Copyright 1999-2017. Parallels IP Holdings GmbH.
class Modules_SlaveDnsManager_Acl
{
    public function add($ipAddress)
    {
        $request = <<<REQUEST
<dns>
    <add_to_acl>
        <filter>
            <host>$ipAddress</host>
        </filter>
    </add_to_acl>
</dns>
REQUEST;
        $this->_call($request);
    }

    public function remove($ipAddress)
    {
        $request = <<<REQUEST
<dns>
    <remove_from_acl>
        <filter>
            <host>$ipAddress</host>
        </filter>
    </remove_from_acl>
</dns>
REQUEST;
        $this->_call($request);
    }

    private function _call($request)
    {
        $response = pm_ApiRpc::getService('1.6.5.0')->call($request);
        // TODO error handling
//        $response->dns->add_to_acl->result->status
//        $response->dns->remove_from_acl->result->status
    }
}
