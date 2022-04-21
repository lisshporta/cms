<div>
    <Button wire:click="$toggle('confirmingDeletion')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        Delete
    </Button>

    <x-jet-confirmation-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            Delete {{$model->name ?? 'Item'}}
        </x-slot>

        <x-slot name="content">
            Are you sure you want to this item? Once deleted, all of its resources and data will be removed permanently.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeletion')">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete">
                Delete
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
