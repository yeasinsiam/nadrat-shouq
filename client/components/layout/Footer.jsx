import Link from "next/link";
import useSWR from "swr";
import useSWRImmutable from "swr/immutable";

const Footer = () => {
  const { data: contactInfo } = useSWR(`/contact-info`, { fallback: {} });
  if (!contactInfo) return <div></div>;

  return (
    <>
      <div className="py-5"></div>
      <footer className="fixed w-full bottom-0 z-50 bg-white border-t shadow-lg  py-3">
        <div className="cs-container px-4 text-sm font-medium flex items-center justify-between">
          <div className="space-x-1">
            <span className="whitespace-nowrap">© 2023 Nadrat Shouq Est</span>
            <span>.</span>
            <Link href="/terms-and-conditions" className="underline">
              Terms
            </Link>
            {/* <span>.</span> */}
            {/* <Link href="/contact-us" className="underline">
              Privacy
            </Link> */}
            <span className="hidden lg:inline">.</span>
            <Link
              href="/contact-us"
              className="hidden underline whitespace-nowrap lg:inline"
            >
              Contact Us
            </Link>
          </div>
          <div className="max-sm:hidden space-x-1">
            <span>
              Email:{" "}
              <a
                className="font-semibold italic underline"
                href={`mailto:${contactInfo.email}`}
              >
                {contactInfo.email}
              </a>
            </span>
            <span>.</span>
            <span>
              Tel:{" "}
              <a
                className="font-semibold italic underline"
                href={`tel:${contactInfo.phone_number}`}
              >
                {contactInfo.phone_number}
              </a>
            </span>
          </div>
        </div>
      </footer>
    </>
  );
};

export default Footer;
