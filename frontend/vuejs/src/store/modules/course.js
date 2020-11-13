export const state = {
    courseData: [
        {
            id:1,
            name: 'PHP',
            description: 'khoa hoc php co ban',
            is_active: 'Activate'
        },
        {
            id:2,
            name: 'C++',
            description: 'khoa hoc C++ co ban',
            is_active: 'Inactivate'
        },
        {
            id:3,
            name: 'Java',
            description: 'khoa hoc Java co ban',
            is_active: 'Activate'
        },
        {
            id:4,
            name: 'C#',
            description: 'khoa hoc C# co ban',
            is_active: 'Inactivate'
        },
        {
            id:5,
            name: 'Python',
            description: 'khoa hoc Python co ban',
            is_active: 'Activate'
        },

    ]
};
export const actions = {
    getCourse({state}) {
        return state.courseData;
    },
    getData({state}, id){
        return state.courseData[id-1];
    }
}
