<table class="w-full table my-6 text-sm text-white">
    <thead>
        <tr>
            <th class="px-4 py-2 text-left">First Name</th>
            <th class="px-4 py-2 text-left">Last Name</th>
            <th class="px-4 py-2 text-left">Email Address</th>
            <th class="px-4 py-2 text-left">Role</th>
            <th class="px-4 py-2 text-left">Member Since</th>
        </tr>
    </thead>
    <tbody class="">
        @foreach ($users as $user)
            <tr class="my-4 bg-mid-gray border-b-8 border-dark-gray">
                <td class="px-4 py-4">
                    <a href="{{ route('users.edit', $user->id) }}"
                        class="text-yellow underline">{{ $user->first_name }}</a>

                </td>
                <td class="px-4 py-4">{{ $user->last_name }}</td>
                <td class="px-4 py-4">{{ $user->email }}</td>
                <td class="px-4 py-4">
                    @foreach ($user->roles as $role)
                        {{ $role->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </td>
                <td class="px-4 py-4">{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
