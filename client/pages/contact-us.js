import apiGetContactInfo from "@/api/contact-info";
import Head from "next/head";
import { BiSolidPhoneCall } from "react-icons/bi";
import { FaLocationDot } from "react-icons/fa6";
import { MdMail } from "react-icons/md";
import useSWRImmutable from "swr/immutable";

export async function getServerSideProps() {
  return {
    props: {
      fallback: {
        "/contact-info": await apiGetContactInfo(),
      },
    },
  };
}

export default function ContactUsPage() {
  const { data: contactInfo } = useSWRImmutable(`/contact-info`);

  return (
    <>
      <Head>
        <title>Contact Us - Nadrat Shouq Est</title>
      </Head>
      <section className="cs-container px-4 max-w-5xl  pt-5 sm:pt-10 grid gap-5 sm:grid-cols-3">
        {/* Contact Info */}
        <div className="group p-4 bg-zinc-200  shadow-lg rounded-md space-y-3">
          <h2 className="font-bold text-xl p-2 bg-zinc-100 w-max rounded-lg  group-hover:underline group-hover:decoration-2">
            Contact Info
          </h2>
          <div className="pl-3 space-y-2">
            {/* Phone */}
            <div className="flex gap-2">
              <BiSolidPhoneCall className="w-7 h-7" />
              <div>
                <div className="text-lg font-semibold">Phone Number</div>
                <div className="italic">{contactInfo.phone_number}</div>
              </div>
            </div>
            {/* Email */}
            <div className="flex gap-2">
              <MdMail className="w-7 h-7" />
              <div>
                <div className="text-lg font-semibold">Email Address</div>
                <div className="italic">{contactInfo.email}</div>
              </div>
            </div>
            {/* Address */}
            <div className="flex gap-2">
              <FaLocationDot className="w-7 h-7" />
              <div>
                <div className="text-lg font-semibold">Address</div>
                <div
                  className="italic"
                  dangerouslySetInnerHTML={{ __html: contactInfo.address }}
                ></div>
              </div>
            </div>

            <p className="!mt-4 animate-pulse">
              <span className="text-md font-bold underline decoration-2 decoration-zinc-700">
                Note:
              </span>{" "}
              <span className="">
                To order our product please contact with given information.
              </span>
            </p>
          </div>
        </div>

        {/* Location Map */}
        <div className=" shadow-lg rounded-md sm:col-span-2 overflow-hidden">
          <iframe
            title="Nadrat Ounak Location"
            src={contactInfo.google_map_location_embedded_url}
            className="border-0 w-full h-96"
            allowFullScreen=""
            // loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          />
        </div>
      </section>
    </>
  );
}
