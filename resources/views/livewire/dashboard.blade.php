<div>
    <h2 class="m-auto w-75 text-center">Dashboard</h2>
    <div class="py-4">
        <div class="m-2 p-2">
            <label for="search">search:</label>
            <input type="text" wire:model='search' class="m-4 border border-primary ">
        </div>
        <x-table>

            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField == 'name' ? $sortDirection : null">Name</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('email')" :direction="$sortField == 'email' ? $sortDirection : null">Email</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField == 'created_at' ? $sortDirection : null">date</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('status')" :direction="$sortField == 'created_at' ? $sortDirection : null">date</x-table.heading>
                <x-table.heading />
            </x-slot>

            <x-slot name="body">
                @foreach ($users as $user)
                    <x-table.row>
                        <x-table.cell>{{ $user->name }}</x-table.cell>
                        <x-table.cell>{{ $user->email }}</x-table.cell>
                        <x-table.cell>{{ $user->created_at }}</x-table.cell>
                        <x-table.cell>{{ $user->status ? 'fine' : 'bad' }}</x-table.cell>
                        <x-table.cell>
                            <x-button.link wire:click='edit({{ $user->id }})'
                                class="bg-link border-primary border-2 p-1">Edit</x-button.link>
                        </x-table.cell>
                    </x-table.row>
                @endforeach

            </x-slot>

        </x-table>
        {{ $users->links() }}
    </div>
    <form wire:submit.prevent='save'>
        <x-modal.dialog wire:model='showEditModal'>
            <x-slot name="title"> Edit User</x-slot>

            <x-slot name="content">
                <x-input.group for="name" label="name" :error="$errors->first('user.name')">
                    <x-input.text wire:model='user.name' id='name'>
                    </x-input.text>
                </x-input.group>
                <x-input.group for="email" label="email" :error="$errors->first('user.email')">
                    <x-input.text wire:model='user.email' id='email'>
                    </x-input.text>
                </x-input.group>
                <x-input.group for="status" label="status" :error="$errors->first('user.status')">
                    <x-input.select wire:model='user.status' id='status'>
                        @foreach (\App\Models\User::STATUS as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group>
            </x-slot>

            <x-slot name="footer">
                <x-button.link class="bg-primary p-1" type="submit">save</x-button.link>
                <x-button.link class="bg-danger p-1" wire:click="$set('showEditModal',false)">cancel</x-button.link>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>
