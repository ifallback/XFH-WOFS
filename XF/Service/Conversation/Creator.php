<?php

namespace XFH\WOFS\XF\Service\Conversation;

use XF;

class Creator extends XFCP_Creator
{
    protected function _validate(): array
    {
        $validator = parent::_validate();

        if ($this->starter->hasPermission('conversation', 'write_only_for_staff'))
        {
            foreach ($this->recipients as $recipient)
            {
                if (!$recipient->is_staff)
                {
                    $this->conversation->error(XF::phrase('xfh_wofs_you_can_start_a_conversation_only_with_staff'));
                }
            }
        }

        return $validator;
    }
}