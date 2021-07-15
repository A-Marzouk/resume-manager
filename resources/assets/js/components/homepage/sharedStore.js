export const searchFreelancersPredictions = [
    //  designers job titles

    // developers job titles:
    "Javascript",
    "PHP",
    'HTML',
    'CSS',
    'Bootstrap',
    "Python",
    "Vue.js",
    "Node.js",
    "React.js",
    "Laravel",
    "SQL",

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
    'UI/UX',
    'Typography',
    'Print Design',
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

const sharedStore = {
    state: {
        q: '',
        qPrefix: [],
        enabledFilters: ['pen'],
        workForceProfiles: [],
        projectPreview: {
            isOpen: false,
            profileIndex: 0,
            projectIndex: 0,
        },
        videoPreview: {
            isOpen: false,
            profileIndex: 0,
            videoIndex: 0,
        }
    },
    getters: {},
    mutations: {
        setWorkforceProfiles(workForceProfiles, append = false) {
            workForceProfiles.forEach((profile) => {
                profile.skillTitles = profile.skills.map(function (skill) {
                    return skill.title.toLowerCase();
                });

                profile.percentageSum = 0;
                profile.skills.forEach((skill) => {
                    profile.percentageSum += parseInt(skill.percentage);
                });
            });


            if (append) {
                sharedStore.state.workForceProfiles = sharedStore.state.workForceProfiles.concat(workForceProfiles)
                return;
            }

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
