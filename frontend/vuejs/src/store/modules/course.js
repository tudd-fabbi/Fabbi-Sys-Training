export const state = {
    tableData: [
        {
            name: 'PHP',
            description: 'khoa hoc php co ban',
            is_active: 'Active'
        },
        {
            name: 'C++',
            description: 'khoa hoc C++ co ban',
            is_active: 'Unactive'
        },
        {
            name: 'Java',
            description: 'khoa hoc Java co ban',
            is_active: 'Active'
        },
        {
            name: 'C#',
            description: 'khoa hoc C# co ban',
            is_active: 'Unactive'
        },
        {
            name: 'Python',
            description: 'khoa hoc Python co ban',
            is_active: 'Active'
        }
    ]
};
export const actions = {
    getCourse({state}) {
        return state.tableData;
    }
}
