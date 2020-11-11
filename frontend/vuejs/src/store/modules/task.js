export const state = {
    tasks: [
        {
            id: 1,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '0'
        },
        {
            id: 2,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
        {
            id: 3,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
        {
            id: 4,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
        {
            id: 5,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
        {
            id: 6,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
        {
            id: 7,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
        {
            id: 8,
            name: 'Fred',
            description: 'Flintstone',
            content: 'asdasdasd',
            deadline: '12-12-2020',
            is_active: '1'
        },
    ],
};

export const actions = {
    getTasks({state}) {
        return state;
    },
    getTaskById({state}, id) {
        return state.tasks[0];
    }
}
