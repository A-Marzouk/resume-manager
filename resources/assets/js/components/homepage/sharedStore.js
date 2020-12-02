export const searchFreelancersPredictions = [
    //  designers job titles
    'UI/UX designer',

    // developers job titles:

    // technical

    // design
    'Photoshop',
    'Product Design',
    'Illustrator',
    'InDesign',
    'Figma',
    'InVision',
    'Sketch',
    'Adobe XD',
    'XD',
    'Adobe Creative Suite',
    'HTML',
    'UI/UX',
    'Typography',
    'Print Design',
    'CSS',
    'Bootstrap',
    'Web Design',
    'Branding',
    'Portfolio Management',
    'Digital Design Software',
    'Adobe Acrobat',
    'Adobe Flash',
    'Dreamweaver',
    'Quark',
    'QuarkXpress',
    'Photo Editing',
    'Choosing Fonts',
    'Logo Creation',
    'Layout',
    'Modifying Designs',
    'Spacing',
    'Storyboard Creation',
    'Color Sense',
    'Color Theory',
    'Composition',
    'Creating Models for Three-dimensional Forms',
    'Infographics',
    'Digital Printing',
    'Estimating Costs',
    'Integrating Visual Messages within Social Media Platforms',
    'Ad Design',
    'Color Schemes',
    'iWork Keynote',
    'Photography',
    'DSLR Cameras',
    'Production',
    'Targeting Visual Communications to Demographic Groups',
    'SEO/SEM',
    'PPC',
    'Lightroom',
    'CRO',
    'A/B Testing',
    'Social Media Marketing and Paid Social Media Advertising',
    'Sales Funnel Management',
    'CMS Tools',
    'Graphic Design',
    'Motion Design',
    'Email Marketing',
    'Email Automation',
    'Data Visualization',

    // developer skills

    //develoepr skills
];

export const homepageWrittenQuotes = [
    "The Top 1% of Freelancer's",
    "Hire the top 1% of Freelance Designer's",
    "Search Freelancer's for Hire",
    'On Demand Freelance Talent',
    'Affordable UI Designer',
    'Reliable UX Designer',
    'Talented Graphic Designer',
    'Creative Illustrator',
    'Visionary Motion Designer',
    'Trusted Animator',
    'Verified Product Designer',
    'Approved UX Architect',
];

export const screenSizes = {
    xs: 375,
    sm: 414,
    md: 768,
    lg: 1024,
    lgXl: 1440,
    xl: 1600,
    xxl: 1920,
}

const sharedStore = {
    env: {
        debug: false,
    },
    state: {
        q: '',
        qPrefix: [],
        enabledFilters: ['pen'],
        workForceProfiles: [],
    },
    getters: {},
    mutations: {
        setWorkforceProfiles(workForceProfiles) {
            workForceProfiles.forEach((profile) => {
                profile.skillTitles = profile.skills.map(function (skill) {
                    return skill.title.toLowerCase();
                });

                // console.log(profile);

                // if (!profile.avatar) {
                //     profile.avatar = '/images/civ-profiles/dummy/avatars/default.png'
                // }

                // if (!profile.hourlyRate) {
                //     profile.hourlyRate = 25
                // }

                // if (!profile.tags) {
                //     profile.tags = [
                //         {
                //             id: 1,
                //             tag: "Ui",
                //         },
                //         {
                //             id: 2,
                //             tag: "Ux",
                //         },
                //         {
                //             id: 3,
                //             tag: "Web",
                //         },
                //         {
                //             id: 4,
                //             tag: "Design",
                //         },
                //         {
                //             id: 5,
                //             tag: "Adobe Xd",
                //         },
                //         {
                //             id: 6,
                //             tag: "Figma",
                //         },
                //     ];
                // }

                // if (!profile.portfolio) {
                //     profile.portfolio = [
                //         { id: 1, title: '', preview: profile.preview },
                //         { id: 2, title: '', preview: profile.preview },
                //         { id: 3, title: '', preview: profile.preview },
                //     ];
                // }

                // profile.title = `${profile.name} - ${profile.job_title}`

                profile.percentageSum = 0;
                profile.skills.forEach((skill) => {
                    profile.percentageSum += parseInt(skill.percentage);
                });
            });

            sharedStore.state.workForceProfiles = workForceProfiles;
        }
    },
    methods: {
        isFilterEnabled(filter) {
            return sharedStore.state.enabledFilters.includes(filter);
        },
    }
};
export default sharedStore;
