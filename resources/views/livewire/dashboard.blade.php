<div>
    <h2 class="m-auto w-75 text-center">Dashboard</h2>
    <div class="py-4">
        <div class="m-2 p-2">
            <label for="search">search:</label>
            <input  type="text" wire:model='search' class="m-4 border border-primary " >
        </div>
        <x-table>

            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField =='name'?$sortDirection:null">Name</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('email')" :direction="$sortField =='email'?$sortDirection:null">Email</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField =='created_at'?$sortDirection:null">date</x-table.heading>
                <x-table.heading />

            </x-slot>

            <x-slot name="body">
                @foreach ($users as $user)
                    <x-table.row>
                        <x-table.cell>{{$user->name}}</x-table.cell>
                        <x-table.cell>{{$user->email}}</x-table.cell>
                        <x-table.cell>{{$user->created_at}}</x-table.cell>
                        <x-table.cell>
                            <x-button.link  wire:click='edit' class="bg-link border-primary border-2 p-1">Edit</x-button.link>
                        </x-table.cell>
                    </x-table.row>
                @endforeach

            </x-slot>

        </x-table>
        {{$users->links()}}
    </div>
    <x-modal wire:modal.defer='showEditModal'>
        <x-slot name="title"> Edit User</x-slot>

        <x-slot name="content">
      
        </x-slot>

        <x-slot name="footer">
            <x-button.link class="bg-primary p-1">save</x-button.link>
            <x-button.link class="bg-danger p-1">cancel</x-button.link>

        </x-slot>

    </x-modal>
</div>
