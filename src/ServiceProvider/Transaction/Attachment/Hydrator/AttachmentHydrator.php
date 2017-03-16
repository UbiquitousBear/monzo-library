<?php
namespace shamiln\monzo\ServiceProvider\Transaction\Attachment\Hydrator;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use shamiln\monzo\Transaction\Attachment\Hydrator\AttachmentHydrator as Hydrator;

class AttachmentHydrator implements ServiceProviderInterface
{
    const PROVIDER_NAME_ATTACHMENT_HYDRATOR = 'transaction.attachment.hydrator';

    /**
     * {@inheritdoc}
     */
    public function register(Container $con)
    {
        $con[self::PROVIDER_NAME_ATTACHMENT_HYDRATOR] = function () {
            return new Hydrator();
        };
    }
}
