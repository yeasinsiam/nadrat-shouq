import { LuHeartHandshake } from "react-icons/lu";
import { FaAward, FaRegHandshake, FaTruckMoving, FaCogs } from "react-icons/fa";
import { FaHouseChimney } from "react-icons/fa6";
import { RiFileEditFill } from "react-icons/ri";
import { IoIosPeople } from "react-icons/io";
import { CountUp } from "use-count-up";
import { InView } from "react-intersection-observer";
import { useEffect, useRef } from "react";
import Link from "next/link";
import MobileContactFixedBtn from "@/components/sections/MobileContactFixedBtn";
import Head from "next/head";
import apiGetTestimonials from "@/api/testimonials";
import useSWRImmutable from "swr/immutable";
import apiGetContactInfo from "@/api/contact-info";

export async function getServerSideProps() {
  return {
    props: {
      fallback: {
        "/testimonials": await apiGetTestimonials(),
        "/contact-info": await apiGetContactInfo(),
      },
    },
  };
}

export default function AboutUsPage() {
  return (
    <>
      <Head>
        <title>About Us - Nadrat Shouq Est</title>
      </Head>
      <section className="cs-container max-w-6xl mt-10 mb-5 grid gap-5 items-center sm:gap-10 sm:grid-cols-2">
        <img
          alt="Who we are"
          src="/images/who-we-are.jpg"
          className="lazyload object-cover rounded-lg "
        />
        <div className="space-y-1 sm:space-y-5">
          <h2 className="font-bold text-2xl sm:text-5xl drop-shadow-lg">
            Welcome to{" "}
            <span className="whitespace-nowrap">Nadrat Shouq Est.</span>
          </h2>
          <div className="space-y-1">
            <p className="text-sm text-zinc-500">
              Nadrat Ounak Furniture, a brand of RFL, is now considered as a
              well-known furniture brand in Saudi Arabia. With the utmost
              promise to provide the finest home and office furniture Nadrat
              Ounak started its journey in 2013. Nadrat Ounak has introduced a
              large variety of quality product with exclusive, contemporary and
              customized design.
            </p>
            <p className="text-sm text-zinc-500">
              To cope up with the national and international demand of
              furniture, Nadrat Ounak established world class factories in Rokon
              and produces furniture using best quality imported raw materials,
              modern machineries, seasoning plant, CNC machine etc with the help
              of experienced engineers, architects and hundreds of skilled
              labors. From the conceptualization to the final delivery, all out
              production goes through strict quality control process.
            </p>
          </div>
        </div>
      </section>
      <section className="pt-10 pb-10 mt-14 mb-5 bg-zinc-200">
        <div className=" cs-container max-w-6xl ">
          <h2 className="font-bold text-3xl text-center mb-7">Our Services</h2>
          <div className="flex justify-center  gap-x-10 gap-y-5 flex-wrap">
            {[
              {
                id: 5,
                icon: <FaTruckMoving className="text-4xl" />,
                name: "FAST DELIVERY",
                text: "We deliver your product in period of time at anywhere in saudi arabia",
              },
              {
                id: 1,
                icon: <FaRegHandshake className=" text-4xl" />,
                name: "AFTER SALE SUPPORT",
                text: "We are providing after sales service within warranty period.",
              },
              {
                id: 4,
                icon: <FaCogs className="text-4xl" />,
                name: "FURNITURE REPAIRING",
                text: "We are repairing any furniture like wooden, foaming, coloring etc.",
              },
              {
                id: 2,
                icon: <RiFileEditFill className=" text-4xl" />,
                name: "MAKE TO ORDER",
                text: "We are also manufacturing after placing an order as a customer requirement.",
              },
              {
                id: 3,
                icon: <FaHouseChimney className="text-4xl" />,
                name: "INTERIOR DECORATION",
                text: "We are working interior work according to customer's demand.",
              },
            ].map((item) => (
              <div
                key={item.id}
                tabIndex="-1"
                className="max-w-xs p-6 border-l-4 border-r-4 border-zinc-600 rounded-lg bg-zinc-100  shadow-xl duration-500 cursor-pointer hover:scale-110 hover:border-zinc-800 max-sm:focus:scale-110 max-sm:focus:border-zinc-800
              sm:gap-x-5
              "
              >
                <div className="flex items-end gap-x-2">
                  {item.icon}
                  <h2 className="font-semibold text-xl whitespace-nowrap">
                    {item.name}
                  </h2>
                </div>
                <p className="text-sm text-zinc-500">{item.text}</p>
              </div>
            ))}
          </div>
          <div className="flex justify-center mt-10">
            <Link
              href="/contact-us"
              className="font-semibold px-4 py-2 border-2 border-zinc-600 rounded-lg duration-500 hover:bg-zinc-600 hover:text-white"
            >
              CONTACT US
            </Link>
          </div>
        </div>
      </section>
      <section className="cs-container max-w-6xl mt-14 mb-5 grid gap-5 items-center  sm:grid-cols-4">
        <div className="h-full sm:col-start-1 sm:row-start-1">
          <img
            alt="CEO"
            src="/images/ninja.jpg"
            className="lazyload object-cover rounded-lg max-w-full max-h-full w-full h-full"
          />
        </div>
        <div className="sm:col-start-2 sm:row-start-1 space-y-1 sm:space-y-1  sm:border-2 transition-transform duration-500 sm:hover:scale-105 sm:p-5 sm:rounded-md sm:shadow-lg">
          <div>
            <h2 className="font-bold text-2xl leading-4">Lorem, ipsum.</h2>
            <span className="italic text-sm font-bold text-zinc-500">CEO</span>
          </div>
          <p className="text-sm text-zinc-500">
            Nadrat Ounak Furniture, a brand of RFL, is now considered as a
            well-known furniture brand in Saudi Arabia. With the utmost promise
          </p>
        </div>
        <div className="h-full sm:col-start-4 sm:row-start-1">
          <img
            alt="Marketing Manager"
            src="/images/marketing-manager.webp"
            className="lazyload object-cover rounded-lg max-w-full max-h-full w-full h-full"
          />
        </div>
        <div className="sm:col-start-3 sm:row-start-1 space-y-1 sm:space-y-1  sm:border-2 transition-transform duration-500 sm:hover:scale-105 sm:p-5 sm:rounded-md sm:shadow-lg">
          <div>
            <h2 className="font-bold text-2xl leading-4">Imran Khan</h2>
            <span className="italic text-sm font-bold text-zinc-500">
              Marketing Manager
            </span>
          </div>
          <p className="text-sm text-zinc-500">
            Nadrat Ounak Furniture, a brand of RFL, is now considered as a
            well-known furniture brand in Saudi Arabia. With the utmost promise
          </p>
        </div>
      </section>
      <section className=" cs-container max-w-6xl mt-14 mb-5 flex gap-10  flex-wrap  justify-center">
        {[
          {
            id: 1,
            count: 5000,
            icon: <FaAward className="mb-5 text-4xl" />,
            text: "Project Complected",
            countDuration: 3,
          },
          {
            id: 2,
            count: 2000,
            icon: <LuHeartHandshake className="mb-5 text-4xl" />,
            text: "Happy Customer",
            countDuration: 3,
          },
          {
            id: 3,
            count: 100,
            icon: <IoIosPeople className="mb-3 text-5xl" />,
            text: "Experts",
            countDuration: 3,
          },
        ].map((item) => (
          <InView key={item.id}>
            {({ inView, ref, entry }) => (
              <div
                ref={ref}
                tabIndex="-1"
                className="basis-[30%] shrink-0 flex-1 p-6 border-b-8 border-zinc-600 rounded-lg bg-zinc-100 flex items-center justify-center flex-col shadow-xl duration-500 cursor-pointer hover:scale-110 hover:border-zinc-800 max-sm:focus:scale-110 max-sm:focus:border-zinc-800"
              >
                {item.icon}
                <h2 className="font-semibold text-xl">
                  <CountUp
                    isCounting={inView}
                    end={item.count}
                    duration={item.countDuration}
                  />
                  +
                </h2>
                <h4 className="font-bold text-2xl whitespace-nowrap">
                  {item.text}
                </h4>
              </div>
            )}
          </InView>
        ))}
      </section>

      {/* Client Review Section */}
      <ClientReviewSection />
      {/* <div className="py-10"></div> */}
      <MobileContactFixedBtn />
    </>
  );
}

const ClientReviewSection = () => {
  const clientsSectionCarouselRef = useRef(true);
  const { data: testimonials } = useSWRImmutable(`/testimonials`);

  // Init Carousel
  useEffect(() => {
    if (clientsSectionCarouselRef.current) {
      const clientsSectionCarousel = clientsSectionCarouselRef.current;

      const handleAfterInit = () => {
        // setCategoryLoaded(true);
      };

      Object.assign(clientsSectionCarousel, {
        grabCursor: true,
        spaceBetween: 15,
        pagination: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: true,
          pauseOnMouseEnter: true,
          reverseDirection: true,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },

          1024: {
            slidesPerView: 3,
          },
        },
        injectStyles: [
          `

        .swiper{
          padding:10px;
          padding-bottom: 45px;
        }
      
      `,
        ],

        on: {
          afterInit: handleAfterInit,
        },
      });
      clientsSectionCarousel.initialize();

      return () => {
        clientsSectionCarousel.swiper.off("afterInit", handleAfterInit);
      };
    }
  }, []);

  return (
    <section id="client-review-section" className="mt-14  bg-zinc-200 pt-10">
      <div className="cs-container max-w-6xl">
        <swiper-container ref={clientsSectionCarouselRef} init="false">
          {testimonials.map((testimonial) => (
            <swiper-slide key={testimonial.id}>
              <div className="overflow-hidden h-44  border-2 border-zinc-500 shadow-lg p-5 bg-zinc-100 rounded-md space-y-2 duration-500 hover:scale-105">
                <div className="flex items-center space-x-2">
                  <img
                    alt={testimonial.avatar.name}
                    src={testimonial.avatar.original_url}
                    className="lazyload object-cover rounded-full w-14 h-14"
                  />
                  <div>
                    <h2 className="font-bold text-2xl leading-4 whitespace-nowrap">
                      {testimonial.name}
                    </h2>
                    <span className="italic text-sm font-bold text-zinc-500">
                      {testimonial.designation}
                    </span>
                  </div>
                </div>
                <p className="text-sm text-zinc-500">{testimonial.comment}</p>
              </div>
            </swiper-slide>
          ))}
        </swiper-container>
        {/* <div className="swiper-pagination"></div> */}
      </div>
    </section>
  );
};
