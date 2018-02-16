<?php

namespace Yosmy\Privilege;

use MongoDB\Model\BSONDocument;

class User extends BSONDocument
{
    /**
     * @param string $id
     * @param array  $roles
     */
    public function __construct(
        string $id,
        array $roles
    ) {
        parent::__construct([
            'id' => $id,
            'roles' => $roles,
        ]);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->offsetGet('id');
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->offsetGet('roles');
    }

    /**
     * {@inheritdoc}
     */
    public function bsonUnserialize(array $data)
    {
        $data['id'] = $data['_id'];
        unset($data['_id']);

        parent::bsonUnserialize($data);
    }
}
